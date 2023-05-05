<?php

namespace src\lib\dto;

abstract class BaseDto
{
    /**
     * @var array<DtoProperty>
     */
    protected $properties = [];

    /**
     * @var array
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->createDto();
    }

    abstract protected function createDto();

    public function isValidDto()
    {
        foreach ($this->properties as $dtoProperty) {
            $name = $dtoProperty->getName();
            if (!$dtoProperty->isRequired() and !isset($this->data[$name])) return true;
            if ($dtoProperty->isRequired() and !isset($this->data[$name])) return false;
            foreach ($dtoProperty->getValidators() as $validator){
                if (!$validator->verify($this->data[$name])) return false;
            }
        }
        return true;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * @param string[] $keys
     * @return array
     */
    public function toArray($keys = []){
        $array = [];
        $keys = empty($keys) ? array_keys($this->data) : $keys;
        foreach ($keys as $key){
            $value = $this->get($key);
            if ($value){
                $array[$key] = $value;
            }
        }
        return $array;
    }
}