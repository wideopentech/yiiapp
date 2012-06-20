<?php

/**
 * Database configuration defaults, tested with MySQL
 */
return array(
    'emulatePrepare' => true,
    'queryCacheID' => 'cacheDbQuery',
    'queryCachingDuration' => 0,
    'schemaCacheID' => 'cacheDbSchema',
    'schemaCachingDuration' => 0,
    #'tablePrefix' => 'app_',
    'charset' => 'utf8',
    /**
     * Make the returned timestamps match local timezone
     */
    'initSQLs' => array('SET time_zone = "' . date('P') . '"'),
);