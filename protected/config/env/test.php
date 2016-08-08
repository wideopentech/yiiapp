<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
// Specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

/**
 * Any pre-configuration items should occur before the following IF statement
 */
if (!defined('YII_ENV_CONFIG'))
    return array();

$tmp = array(
    'components'=>array(
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=sometestdatabase',
            'username' => 'sometestusername',
            'password' => 'sometestpassword',
        ),
    ),
);

if (Yii::app() instanceof CWebApplication)
    $tmp['components']['log']['routes']['web'] = array(
        'levels' => 'error, warning, info',
    );

return $tmp;