<?php


namespace src\traits;


use src\libs\Cookie;

/**
 * Trait Lang
 * @package src\traits
 */
trait Lang
{
    /**
     * @var string $currentLang
     */
    private $currentLang;

    /**
     * @return string
     */
    public function getCurrentLang():string
    {
        $cookie = new Cookie($this->config['cookieName']);
        $lang = $this->config['defaultLanguage'];

        if ($cookie->getValue()) {
            $lang = $cookie->getValue();
        }

        return $this->currentLang ? $this->currentLang : $lang;
    }

    /**
     * @param string $lang
     * @return string|null
     */
    public function setLang(string $lang):?string
    {
        $cookie = new Cookie($this->config['cookieName'], $lang);
        $cookie->setCookie();
        $this->currentLang = $lang;

        return $cookie->getValue();
    }

    /**
     * @return string|null
     */
    public function removeLang():?string
    {
        $cookie = new Cookie($this->config['cookieName'], '');
        $cookie->setCookie();

        return $cookie->getValue();
    }

}