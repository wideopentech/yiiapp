<?php

/**
 * Base logging configuration
 */
return array(
    'class' => 'CLogRouter',
    'routes' => array(
        'file'=>array(
            'class' => 'CFileLogRoute',
            'levels' => 'error, warning, info',
        ),
    ),
);