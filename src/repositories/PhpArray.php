<?php

namespace src\repositories;


use src\interfaces\RepositoryInterface;
use src\traits\Lang;

/**
 * Class PhpArray
 * @package src\repositories
 */
class PhpArray implements RepositoryInterface
{
    use Lang;

    /**
     * @var array
     */
    private $config;

    /**
     * PhpArray constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @param string $default
     * @param string $domain
     * @return string|null
     */
    public function getTranslate(string $key, string $default = '', string $domain = 'main'): ?string
    {
        $curr = $this->getCurrentLang();
        $path = $this->config['path'] . '/' . $curr . '/' . $domain . '.php';
        if (!file_exists($path)) {
            return $default;
        }

        $translate = include $path;

        if ($translate[$key] !== NULL) {
            return $translate[$key];
        }

        return $default;
    }
}