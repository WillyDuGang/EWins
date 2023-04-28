<?php

namespace src\lib\dto\validator;

class MaxLength implements IValidator
{
    /**
     * @var int
     */
    private $max;

    public function __construct($max)
    {
        $this->max = $max;
    }


    public function verify($data)
    {
        return $this->max >= strlen($data);
    }
}