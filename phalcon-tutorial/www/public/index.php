<?php

use Phalcon\Loader;                 // オートローダー使うよ！って宣言
use Phalcon\Mvc\View;               // ビューを使用するために必要な宣言
use Phalcon\Mvc\Application;        // MVCの煩雑な処理はこれが行なっているらしい
use Phalcon\Di\FactoryDefault;      // Phalconに付属しているコンポーネントのほとんどを登録するための宣言
use Phalcon\Mvc\Url as UrlProvider; // URLを作成するために必要な宣言

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Register an autoloader
$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);

$loader->register();

// Create a DI
$di = new FactoryDefault();

// Setup the view component
$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);

// Setup a base URI
$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    }
);

$application = new Application($di);

try {
    // Handle the request
    $response = $application->handle();

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}