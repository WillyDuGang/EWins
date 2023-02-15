<?php

namespace src\controller;

interface IController
{
    /**
     * @param int $method
     * @param string[] $params
     * @param string[] $queries
     */
    public function __construct($method, $params = [], $queries = []);
}