<?php

namespace src\lib\dto\validator;

class IsEmail implements IValidator
{

    public function verify($data)
    {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}