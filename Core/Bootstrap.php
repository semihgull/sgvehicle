<?php


namespace Core;
use Buki\Router\Router;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use Valitron\Validator;
use Arrilot\DotEnv\DotEnv;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Bootstrap {

    public $router;
    public $view;
    public $validator;


    public function __construct () {

        // env settings
        DotEnv::load(dirname (__DIR__) . '/.env.php');

        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());

        if (DotEnv::get ('DEVELOPMENT')){
            $whoops->register();
        }

        // Carbon(Tarih) Class
        Carbon::setLocale (env_ ('LOCALE', 'tr_TR'));

        // Database
        $capsule = new Capsule();

        // Connection nesnesini global yapmak için
        $capsule->setAsGlobal();

        // DB Eloquent kullnaımı için
        $capsule->bootEloquent();

        $capsule->addConnection([
            'driver'    => env_ ('DB_DRIVER', 'mysql'),
            'host'      => env_ ('DB_HOST', 'localhost'),
            'database'  => env_ ('DB_NAME'),
            'username'  => env_ ('DB_USER'),
            'password'  => env_ ('DB_PASSWORD'),
            'charset'   => env_('DB_CHARSET', 'utf8mb4'),
            'collation' => env_ ('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix'    => env_ ('DB_PREFIX'),
        ]);
        // Router Start
        $this->router = new Router([
            'paths' => [
                'controllers' => 'app/controllers',
                'middlewares' => 'app/middlewares'
            ],
            'namespaces' => [
                'controllers' => 'App\Controllers',
                'middlewares' => 'App\Middlewares'
            ]
        ]);

        //Validator Class Start
        $this->validator = new Validator($_POST);
        Validator::langDir (dirname (__DIR__) . '/public/validator_lang');
        Validator::lang ('tr');

        // Disable prepending the labels
        $this->validator->setPrependLabels(false);

        //Core View Class Start
        $this->view = new View($this->validator);
    }

    public function run ()
    {
        $this->router->run ();
    }
}