<?php

namespace src\controller;

use core\router\Router;

class Connexion implements IController
{

    public function __construct($method, $params = [], $queries = [])
    {
        switch ($method) {
            case Router::METHODS['GET']:
                require ('template/connexion.php');
                break;
            case Router::METHODS['POST']:

                break;
        }
    }
}