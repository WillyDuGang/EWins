<?php

echo <<<EOD

EOD;

require_once 'core/AutoLoader.php';

use core\router\Router;
use core\AutoLoader;
use src\controller\Accueil;
use src\controller\Inscription;

(new AutoLoader())->init();

$router = new Router();
$router->add('', [Router::METHODS['GET']], Accueil::class, true);
$router->add('inscription', [Router::METHODS['GET']], Inscription::class);
$router->call();
