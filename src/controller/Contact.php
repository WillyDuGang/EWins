<?php

namespace src\controller;

class Contact implements IController
{

    public function __construct($method, $params = [], $queries = [])
    {
        require ('template/contact.php');
    }
}