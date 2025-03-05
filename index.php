<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/models/BaseModel.php';
require_once __DIR__ . '/controllers/BaseController.php';

$config = require __DIR__ . '/config/config.php';

define('BASE_URL', $config['base_url']);
define('ENVIRONMENT', $config['environment']);

foreach (glob(__DIR__ . '/system/helpers/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__. '/system/classes/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/helpers/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__. '/controllers/*.php') as $file) {
    if (basename($file) !== 'BaseController.php') {
        require_once $file;
    }
}

foreach (glob(__DIR__. '/models/*.php') as $file) {
    if (basename($file) !== 'BaseModel.php') {
        require_once $file;
    }
}

define('LANG', get_language());

$routes = require __DIR__ . '/config/routes.php';
$route  = false;

foreach ($routes as $key => $value) {
    $controller = 'App\\Controllers\\' . $value[0];
    $method     = $value[1];
    $key        = $key === 0 ? '' : $key;

    $route = router($key, static function ($param = null) use ($controller, $method) {
        $class = new $controller;
        if ($param !== null) {
            $class->$method($param);
        } else {
            $class->$method();
        }
    });

    if ($route) {
        break;
    }
}

if (!$route) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit();
}