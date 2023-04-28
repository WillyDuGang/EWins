<?php

namespace src\lib\dto\validator;

class IsString implements IValidator
{
    public function verify($data)
    {
        return is_string($data);
    }


}