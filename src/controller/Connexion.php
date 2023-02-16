<?php

namespace src\controller;

class Connexion implements IController
{

    public function __construct($method, $params = [], $queries = [])
    {
        require ('template/connexion.php');
    }
}