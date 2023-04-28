<?php

namespace src\lib\model;

use PDO;
use src\lib\database\Database;

abstract class BaseRepository
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * @return PDO
     */
    protected function getConnection()
    {
        return $this->connection;
    }
}