<?php


namespace src\interfaces;

/**
 * Interface RepositoryInterface
 * @package src\interfaces
 */
interface RepositoryInterface
{
    /**
     * RepositoryInterface constructor.
     * @param array $config
     */
    public function __construct(array $config);

    /**
     * @param string $key
     * @param string $default
     * @param string $domain
     * @return mixed
     */
    public function getTranslate(string $key, string $default = '', string $domain = 'main');

}