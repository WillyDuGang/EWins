<?php

namespace src\lib\dto;



use src\lib\dto\validator\IValidator;

class DtoProperty
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var IValidator
     */
    private $validators;

    /**
     * @var bool
     */
    private $isRequired;

    public function __construct($name, array $validators = [], $isRequired = false)
    {
        $this->name = $name;
        $this->validators = $validators;
        $this->isRequired = $isRequired;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->isRequired;
    }

    /**
     * @return IValidator
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}