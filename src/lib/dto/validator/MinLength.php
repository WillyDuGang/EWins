<?php

namespace src\lib\dto\validator;

class MinLength implements IValidator
{
    /**
     * @var int
     */
    private $min;

    public function __construct($min)
    {
        $this->min = $min;
    }


    public function verify($data)
    {
        return $this->min <= strlen($data);
    }
}