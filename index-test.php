<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/conf.d/test.php';
$configEnv=dirname(__FILE__).'/protected/config/conf.d/env.php';

require($configEnv);
require_once($yii);
Yii::createWebApplication($config)->run();
