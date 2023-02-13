<?php

namespace src\controller;

class Accueil implements Controller
{
    public function __construct($method, $params = [], $queries = [])
    {
        require 'template/accueil.php';
    }
}