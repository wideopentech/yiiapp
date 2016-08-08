<?php

$confDir = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$config = new CConfiguration(array(
    'basePath' => $confDir . '..',
    'timeZone' => 'America/New_York',
    'import' => require($confDir . 'conf.d' . DIRECTORY_SEPARATOR . 'import.php'),
    'params' => require($confDir . 'conf.d' . DIRECTORY_SEPARATOR . 'params.php'),
    'onBeginRequest' => function(CEvent $event)use($confDir){
        if (Yii::app() instanceof CConsoleApplication && isset($_SERVER['argv'][1])
            && ($_SERVER['argv'][1]==='env' || ($_SERVER['argv'][1]==='help' && $_SERVER['argv'][2]==='env'))) {
            /**
             * Don't print any ENV errors when user is attempting to set ENV
             */
            return;
        }
        else if (defined('YII_ENV_REQUIRED') && YII_ENV_REQUIRED===true)
            throw new CException('Environment must be specified!');
        else if (defined('YII_ENV_CONFIG_MISSING') && YII_ENV_CONFIG_MISSING===true)
            throw new CException('Environment configuration is missing!');
    },
));

if(Yii::app() instanceof CWebApplication) {
    $appType = 'web';
} elseif(Yii::app() instanceof CConsoleApplication) {
    $appType = 'console';
}

if(isset($appType)) {
    $appTypeConf=$confDir . 'conf.d' . DIRECTORY_SEPARATOR . $appType .'.php';
    if (file_exists($appTypeConf)) {
        $config->mergeWith(require($appTypeConf));
    }
}

$flags = GlobIterator::KEY_AS_FILENAME|GlobIterator::CURRENT_AS_PATHNAME;
$includeConfigs = function($dir, $callback=null)use($flags, $confDir, $config, $appType){
    $iterator = new AppendIterator;
    $iterator->append(new GlobIterator($confDir . $dir . DIRECTORY_SEPARATOR . '*.php', $flags));
    if(isset($appType)) {
        $iterator->append(new GlobIterator($confDir . $dir . DIRECTORY_SEPARATOR . $appType . DIRECTORY_SEPARATOR . '*.php', $flags));
    }

    iterator_apply($iterator, function(AppendIterator $iterator)use($config, $dir, $callback){
        $configName = substr($iterator->key(), 0, -4);
        /**
         * @var CConfiguration $config
         */
        $configValue = include($iterator->current());
        if($callback!==null)
            $callback($configName, $configValue);

        $config->mergeWith(array($dir=>array($configName=>$configValue)));

        return true;
    }, array($iterator));
};

$includeConfigs('components');
$includeConfigs('modules', function($name, $conf)use($config){
    /**
     * Define aliases for modules that are namespaced
     */
    if (isset($conf['class']) && strpos($conf['class'], '\\')!==false && Yii::getPathOfAlias($conf['class'])===false)
        $config->mergeWith(array('aliases'=>array($name=>'application.modules.'.$name)));
});

/**
 * Preload log component if it's enabled
 */
if (isset($config['components']['log']))
    $config->mergeWith(array('preload'=>array('log')));

/**
 * Load environment configuration
 */
if (defined('YII_ENV_CONFIG'))
    $config->mergeWith(require(YII_ENV_CONFIG));

return $config->toArray();