<?php
return [
    'db' => [
        'driver' => 'Pdo_Mysql',
        'database' => 'SENTRIFUGO_DBNAME', // Placeholder from application.ini
        'username' => 'SENTRIFUGO_USERNAME', // Placeholder from application.ini
        'password' => 'SENTRIFUGO_PASSWORD', // Placeholder from application.ini
        'hostname' => 'SENTRIFUGO_HOST',     // Placeholder from application.ini
        // Add other options like charset if known
    ],
    'application_settings' => [
        'auth_salt' => 'xcNsdaAd73328aDs73oQw223hd', // From application.ini
        'auth_timeout' => 3600, // From application.ini (60 minutes * 60 seconds)
        'user_date_format' => 'm-d-Y',
        'calendar_date_format' => 'mm-dd-yy',
        'db_date_format' => 'Y-m-d',
        'perpage' => 10,
        'default_menu' => 'home', // Renamed from 'menu' for clarity
        'default_eventid' => '', // Renamed from 'eventid' for clarity
        'access_control_file_path' => '/app/application/modules/default/plugins/AccessControl.php',
        'site_constants_file_path' => '/app/public/site_constants.php',
        'email_constants_file_path' => '/app/public/email_constants.php',
        'emptab_config_file_path' => '/app/public/emptabconfigure.php',
        'email_config_file_path' => '/app/public/mail_settings_constants.php',
        'application_constants_file_path' => '/app/public/application_constants.php',
        'logo_url' => '/public/images/landing_header.jpg',
        // Dynamic values like currentdate, currenttime are omitted
    ],
];
