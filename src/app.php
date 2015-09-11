<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\HttpFoundation\Response;

$app = new Application();

/*
|--------------------------------------------------------------------------
| Load environmental variables
|--------------------------------------------------------------------------
*/

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

/*
|--------------------------------------------------------------------------
| Setup development environment
|--------------------------------------------------------------------------
*/
if (getenv('APP_ENV') == 'development'){
    $app['debug'] = true;
}

/*
|--------------------------------------------------------------------------
| Load Service Providers
|--------------------------------------------------------------------------
*/

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../var/logs/'. date('Y-m-d') . '-' . getenv('APP_ENV') .'.log',
));


return $app;