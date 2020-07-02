<?php


namespace src\repositories;


use src\interfaces\RepositoryInterface;
use src\models\Translate;
use src\traits\Lang;
use Illuminate\Database\Capsule\Manager as Capsule;

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
     * @var Capsule
     */
    private $capsule;


    /**
     * DB constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->capsule = new Capsule;

        $this->connect();
        $this->boot();
    }


    public function connect()
    {
        $this->capsule->addConnection([
            'driver' => $this->config['db']['driver'],
            'host' => $this->config['db']['host'],
            'database' => $this->config['db']['database'],
            'username' => $this->config['db']['username'],
            'password' => $this->config['db']['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $this->capsule->setAsGlobal();
    }

    public function boot()
    {
        $this->capsule->bootEloquent();
    }


    /**
     * @param string $key
     * @param string $default
     * @param string $domain
     * @return mixed|void
     */
    public function getTranslate(string $key, string $default='', string $domain='main'): ?string
    {
        new DB($this->config);

        $curr = $this->getCurrentLang();
        $query = ['key'=> $key, 'language'=> $curr, 'category'=> $domain];

        Translate::findOrFail(1);

        $table = Translate::where($query)->value('value');

        if($table !== NUll){
            return $table;
        } else {
            return $default;
        }

        return $default;
    }


    public function createTable() {
        $this->capsule::schema()->create('translate', function ($table) {
            $table->increments('id');
            $table->char('language', 100);
            $table->char('category', 255);
            $table->char('key');
            $table->longText('value');
            $table->integer('status')->unsigned();

        });
    }
}