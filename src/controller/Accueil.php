<?php

namespace src\controller;

class Accueil implements IController
{
    public function __construct($method, $params = [], $queries = [])
    {
        require ('template/accueil.php');
    }
}