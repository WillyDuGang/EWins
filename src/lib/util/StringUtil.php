<?php

namespace src\lib\util;

class StringUtil
{
    /**
     * @param string $baseString
     * @return string
     */
    public static function generateUniqueString($baseString){
        return uniqid($baseString . '-');
    }
}