<?php

require_once __DIR__ . '/vendor/autoload.php';
$config = include __DIR__ . '/config/main.php';


\src\Localization::run()->setConfig($config);

//$res['main'] =  \src\Localization::run()->__t('some', 'Какой-то текст', 'main');
//$res ['footer'] =  \src\Localization::run()->__t('contact', 'Какой-то текст', 'footer');
$res =  \src\Localization::run()->__t('some', 'Данные', 'main');

var_dump($res);


