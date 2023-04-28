<?php

namespace src\lib\dto\validator;

interface IValidator
{
    /**
     * @param mixed $data
     * @return mixed
     */
    public function verify($data);

}