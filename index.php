<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$configEnv=dirname(__FILE__).'/protected/config/conf.d/env.php';

require($configEnv);
require_once($yii);
Yii::createWebApplication($config)->run();
