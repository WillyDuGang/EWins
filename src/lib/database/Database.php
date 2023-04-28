<?php

namespace src\lib\database;

use core\Config;
use PDO;
use PDOException;
use src\lib\response\ErrorResponse;

class Database
{
    /**
     * @var PDO
     */
    private static $database;

    /**
     * @return PDO
     */
    public static function getConnection()
    {
        if (!isset(self::$database)) {
            try {
                self::$database = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8', Config::DB_USERNAME, Config::DB_PASSWORD);
            } catch (PDOException $e) {
                new ErrorResponse(503, ['La base de données est inaccessible pour le moment, veuillez réessayer plus tard.']);
            }
        }
        return self::$database;
    }
}
