<?php

require_once __DIR__ . '/vendor/autoload.php';

echo \src\Localization::run()->__t('some', 'Какой-то текст', 'main');