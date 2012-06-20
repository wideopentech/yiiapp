<?php

/**
 * Web log route display
 */
return array(
    'class' => 'CLogRouter',
    'routes' => array(
        'web'=>array(
            'class' => 'CWebLogRoute',
            'levels' => 'error, warning',
        ),
    ),
);