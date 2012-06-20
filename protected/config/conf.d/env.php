<?php

/**
 * Load environment configuration
 */
$confDir = dirname(__FILE__). DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
$envPath = $confDir . '..' . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'env.php';
if (file_exists($envPath)) {
    require($envPath);
    if (defined('YII_ENVIRONMENT')) {
        $envFile = $confDir.'env'. DIRECTORY_SEPARATOR . YII_ENVIRONMENT .'.php';
        if (defined('YII_ENV_CONFIG') || file_exists($envFile)) {
            $envConfig = require($envFile);
            define('YII_ENV_CONFIG', $envFile);
        } else {
            define('YII_ENV_CONFIG_MISSING', true);
        }
    } else {
        define('YII_ENV_CONFIG_MISSING', true);
    }
} else {
    define('YII_ENV_REQUIRED', true);
}