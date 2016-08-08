<?php

/**
 * Url rewriting configuration
 */
return array(
    'urlFormat' => 'path',
    'showScriptName' => false,
    'cacheID' => 'cacheUrl',
    /**
     * The rules block below are the standard commented-out rule examples
     */
    /*'rules'=>array(
         '<controller:\w+>/<id:\d+>'=>'<controller>/view',
         '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
         '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
     ),*/
    /**
     * ActiveUrlRule is a custom rule class, providing url lookups via db
     */
    /*'urlRuleClass' => 'ActiveUrlRule',
    'rules' => array(
        'image/<storage>/<location:>/<fileName:>' => array('/image/get'),
        'trend/v/<id:\w+>/*' => 'trend/v/',
        '<uniqid:[\w\d]+><a:(?:\/([^\/]+))?>*' => array('profile<a>',
            'modelClass'=>'User',
            'paramMap'=>array(*/
                /**
                 * Array of what parameters should be populated from model
                 * GET param => model param
                 */
                /*'id'=>'id',
            ),
            'parseCondition'=>'uniqid = :uniqid',
            'createCondition'=>'id = :id',
        ),
    ),*/
);