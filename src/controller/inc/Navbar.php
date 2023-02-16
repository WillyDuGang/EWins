<?php

namespace src\controller\inc;

class Navbar
{
    public function __construct()
    {
        $currentPath = $_GET['currentPath'];
        require ('template/inc/navbar.inc.php');
    }
}