<?php


namespace src;

use src\interfaces\RepositoryInterface;
use src\repositories\PhpArray;
use src\traits\Lang;
use function Composer\Autoload\includeFile;

/**
 * Class Localization
 * @package src
 */
class Localization
{
    use Lang;

    /**
     * @var array $config
     */
    public $config;

    /**
     * @var RepositoryInterface $repository
     */
    private $repository;

    /**
     * @var
     */
    public static $instance;

    public function __construct()
    {

    }

    /**
     * @param string $key
     * @param string $default
     * @param string $domain
     * @return mixed
     */
    public function __t(string $key, string $default = '', string $domain ='main')
    {
        return $this->repository->getTranslate($key, $default, $domain);
    }

    /**
     * @param $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
        $this->repository = new $this->config['source']($this->config);
    }

    /**
     * @return Localization
     */
    public static function run()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}