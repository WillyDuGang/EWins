<?php

namespace src\lib\util;

use src\lib\response\RedirectResponse;

class Config
{
    private static $config;

    /**
     * @return array
     */
    private static function getConfig(){
        if (!isset(self::$config)){
            self::$config = json_decode(file_get_contents('config.json'), true);
        }
        return self::$config;
    }

    /**
     * @param string $key
     * @return mixed|string
     */
    public static function get($key){
        return isset(self::getConfig()[$key]) ? self::getConfig()[$key] : '';
    }
}