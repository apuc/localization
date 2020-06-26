<?php


namespace src\repositories;


use src\interfaces\RepositoryInterface;
use src\traits\Lang;

/**
 * Class DB
 * @package src\repositories
 */
class DB implements RepositoryInterface
{
    use Lang;

    /**
     * @var array
     */
    private $config;

    /**
     * DB constructor.
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
     * @return mixed|void
     */
    public function getTranslate(string $key, string $default='', string $domain='main')
    {
        $curr = $this->getCurrentLang();

        // TODO: Implement getTranslate() method.
    }
}