<?php

namespace src\controller;

class Connexion implements IController
{

    public function __construct($method, $params = [], $queries = [])
    {
        switch ($method){
            case 'POST':
                break;
            default:
                require ('template/connexion.php');
        }
    }
}