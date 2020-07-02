<?php

return [
    'source' => \src\repositories\Db::class,
    'path' => 'lang',
    'currentLangContainer' => 'cookie',
    'defaultLanguage' => 'ru',
    'cookieName' => '__name',
    'db' => [
        'driver' => 'mysql',
        'host' => 'your database host',
        'database' => 'database name',
        'username' => 'name',
        'password' => 'password',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ]
];