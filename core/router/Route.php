<?php

namespace core\router;

class Route
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var array
     */
    private $methods;

    /**
     * @var class-string
     */
    private $controller;
    /**
     * @var class-string[]
     */
    private $guards;

    /**
     * @param $path
     * @param array $methods
     * @param class-string $controller
     * @param class-string[] $guards
     */
    public function __construct($path, array $methods, $controller, $guards = [])
    {
        $this->path = $path;
        $this->methods = $methods;
        $this->controller = $controller;
        $this->guards = $guards;
    }

    /**
     * @return array
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return string[]
     */
    public function getGuards()
    {
        return $this->guards;
    }
}