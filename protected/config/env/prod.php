<?php

/**
 * Any pre-configuration items should occur before the following IF statement
 */
if (!defined('YII_ENV_CONFIG'))
    return array();

$tmp = array(
    'components'=>array(
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=someproddatabase',
            'username' => 'someprodusername',
            'password' => 'someprodpassword',
        ),
        'log'=>array(
            'routes'=>array(
                'email'=>array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error',
                    'sentFrom' => 'error@example.com',
                    'emails' => array('admin@example.com'),
                )
            )
        ),
    ),
);

return $tmp;