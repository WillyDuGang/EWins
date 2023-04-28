<?php

namespace src\lib\dto;


use src\lib\dto\validator\IsEmail;
use src\lib\dto\validator\IsImageFile;
use src\lib\dto\validator\IsString;
use src\lib\dto\validator\MinLength;

class RegisterDto extends BaseDto
{

    protected function createDto()
    {
        $this->properties[] = new DtoProperty('name', [new IsString()], true);
        $this->properties[] = new DtoProperty('firstName', [new IsString()], true);
        $this->properties[] = new DtoProperty('email', [new IsString(), new IsEmail()], true);
        $this->properties[] = new DtoProperty('pseudo', [new IsString()], true);
        $this->properties[] = new DtoProperty('password', [new IsString(), new MinLength(8)], true);
        $this->properties[] = new DtoProperty('confirmPassword', [new IsString(), new MinLength(8)], true);
        $this->properties[] = new DtoProperty('profilePicture', [new IsImageFile()], true);
    }
}