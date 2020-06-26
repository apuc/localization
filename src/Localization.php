<?php


namespace src;


use src\traits\Lang;

class Localization
{
    use Lang;

    public function __construct()
    {
    }

    public function __t($key, $default = '', $domain = 'main')
    {
        return $this->getCurrentLand();
        //TO DO
    }

    public function addTranslate($key, $value, $domain)
    {

    }

    public static function run()
    {
        return new self();
    }

}