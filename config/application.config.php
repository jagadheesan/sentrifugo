<?php
return [
    'modules' => [
        'Laminas\Router',
        'Laminas\Validator',
        // Add other Laminas components if known to be essential immediately
        'Application', // Our primary application module
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
    ],
];
