<?php

class EnvCommand extends CConsoleCommand {

    public $defaultAction='list';

    public function actionList() {
        $envs = $this->availableEnvs();
        if ($envs===array())
            die('No environments are currently defined!'."\n");
        echo 'Available environment options:'."\n\t". implode("\n\t", $this->availableEnvs()) .''."\n";
    }

    public function actionUse($args) {
        if (!isset($args[0]))
            die('Error: The environment name must be specified!'."\n");

        $env=$args[0];
        if (!in_array($env, $this->availableEnvs()))
            die('Error: The environment name specified is not a valid option!'."\n");

        $result = file_put_contents(Yii::getPathOfAlias('application.runtime'). DIRECTORY_SEPARATOR .'env.php', $this->envTpl($env));
        if ($result===false)
            die('Error occurred while saving environment configuration. Configuration could not be saved!'."\n");
        echo 'Environment updated to:'."\n\t". $env ."\n";
    }

    public function actionCurrent() {
        if (!defined('YII_ENVIRONMENT'))
            die('No environment is currently selected.'."\n");
        echo 'Current environment is set to:'."\n\t". YII_ENVIRONMENT ."\n";
    }

    protected function availableEnvs() {
        return array_map(function($file){return substr(basename($file), 0, -4);},
            CFileHelper::findFiles(Yii::getPathOfAlias('application.config.env'), array('fileTypes'=>array('php')))
        );
    }

    public function getHelp()
    {
        return <<<EOD
USAGE
  yiic env [action] [parameter]

DESCRIPTION
  This command provides support for application environments. The optional
  'action' parameter specifies which specific task to perform.
  It can take these values: list, use, current.
  Each action takes different parameters. Their usage can be found in
  the following examples.

EXAMPLES
 * yiic env
   Lists available environments. This is equivalent to 'yiic env list'.

 * yiic env current
   Displays the currently selected environment.

 * yiic env use prod
   Switches the current environment to 'prod'.

EOD;
    }

    protected function envTpl($envName) {
        $tpl = <<<EOD
<?php
define('YII_ENVIRONMENT', '{envName}');
EOD;
        return strtr($tpl, array('{envName}'=>$envName));
    }
}