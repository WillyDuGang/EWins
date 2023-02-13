<?php

namespace src\controller;

interface Controller
{
    /**
     * @param int $method
     * @param string[] $params
     * @param string[] $queries
     */
    public function __construct($method, $params = [], $queries = []);
}