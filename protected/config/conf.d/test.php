<?php

/**
 * Configuration for automated tests
 * @todo Likely needs re-organization to best work with env configs
 */
return CMap::mergeArray(
    require(dirname(__FILE__). DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'main.php'),
    array(
        'components'=>array(
            'fixture'=>array(
                'class'=>'system.test.CDbFixtureManager',
            ),
            /* uncomment the following to provide test database connection
            'db'=>array(
                    'connectionString'=>'DSN for test database',
            ),
            */
        ),
    )
);