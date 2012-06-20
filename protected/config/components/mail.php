<?php

/**
 * Mail extension for sending multiple email types (html, text, etc)
 */
return array(
    'class' => 'ext.yii-mail.YiiMail',
    'transportType' => 'php',
    /**
     * Gmail configuration example - comment out php transport type above
    'transportType' => 'smtp',
    'transportOptions' => array(
        'host' => 'smtp.gmail.com',
        'username' => 'user@domain.com',
        'password' => 'somepassword',
        'port' => 465,
        'encryption' => 'ssl',
    ),*/
    /**
     * Mail theme path
     */
    #'viewPath' => 'application.themes.Classic.views.mail',
    'logging' => true,
    'dryRun' => true,
);