<?php

namespace src\lib\database;

use PDO;
use PDOException;
use src\lib\response\RedirectResponse;
use src\lib\util\Config;

class Database {

    /**
     * @var PDO
     */
    private static $database;

    /**
     * @return PDO
     */
    public static function getConnection()
    {
        if (self::$database === null) {
            try {
                self::$database = new PDO(
                    'mysql:host=' . Config::get('DB_HOST') . ';dbname=' . Config::get('DB_NAME') . ';charset=UTF8',
                    Config::get('DB_USER'),
                    Config::get('DB_PASSWORD')
                );
                self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                new RedirectResponse(['Une erreur est servenue lors de la connexion à la base de donnée. <br>' . $e->getMessage()], '/', false);
            }
        }
        return self::$database;
    }
}
