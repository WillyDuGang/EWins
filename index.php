<?php

echo <<<EOD

EOD;

require_once 'core/AutoLoader.php';

use core\router\Router;
use core\AutoLoader;
use src\controller\Accueil;
use src\controller\Inscription;
use src\controller\Connexion;
use src\controller\Contact;

(new AutoLoader())->init();

$router = new Router();
$router->add('', [Router::METHODS['GET']], Accueil::class);
$router->add('inscription', [Router::METHODS['GET'], Router::METHODS['POST']], Inscription::class);
$router->add('connexion', [Router::METHODS['GET']], Connexion::class);
$router->add('contact', [Router::METHODS['GET']], Contact::class);
$router->call();

