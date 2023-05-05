<?php
namespace src\lib\util;
use src\lib\dto\BaseDto;

class Format
{
    /**
     * @param $text
     * @return string[]
     */
    public static function formatResponseMessage($text) {
        return explode(', ', $text);
    }

}