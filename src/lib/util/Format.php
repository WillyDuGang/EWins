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

    /**
     * @param BaseDto $dto
     * @param array $keys
     * @return array
     */
    public static function dtoToArray($dto, $keys){
        $array = [];
        foreach ($keys as $key){
            $value = $dto->get($key);
            if ($value){
                $array[$key] = $value;
            }
        }
        return $array;
    }

}