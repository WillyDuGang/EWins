<?php

echo <<<EOD

EOD;

require_once 'core/AutoLoader.php';

use core\router\Router;
use core\AutoLoader;
use src\controller\Accueil;

(new AutoLoader())->init();

$router = new Router();
$router->add('', [Router::METHODS['GET']], Accueil::class, true);
$router->call();
