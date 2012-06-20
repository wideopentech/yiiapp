<?php

return array(
    'adminEmail' => 'info@example.com',
    // This is the email info from which messages will come
    'fromEmail' => 'support@example.com',
    'fromEmailName' => 'My Website Staff',

    /**
     * For dynamic file delivery via webserver, using x-sendfile
     */
    #'xHeader' => 'X-Accel-Redirect', // Needed for nginx, remove for Apache
);