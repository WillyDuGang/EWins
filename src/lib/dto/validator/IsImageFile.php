<?php

namespace src\lib\dto\validator;

class IsImageFile implements IValidator
{
    public function verify($data)
    {
        if (!is_array($data)) return false;
        if (!in_array($data['type'], ['image/png', 'image/jpeg'])) return false;
        return true;
    }
}