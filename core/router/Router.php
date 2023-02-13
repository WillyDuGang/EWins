<?php

namespace core\router;

class Router
{
    const METHODS = [
        'GET' => 0,
        'POST' => 1,
        'PUT' => 2,
        'PATCH' => 3,
        'DELETE' => 4
    ];

    /**
     * @var Route[]
     */
    private $routes = [];


    /**
     * @param string $path
     * @param array $methods
     * @param class-string $controller
     * @param bool $isErrorPage
     * @param array $guards
     * @return void
     */
    public function add($path, array $methods, $controller, $isErrorPage = false, array $guards = [])
    {
        if ($isErrorPage) {
            $this->routes['errorPage'] = new Route($path, $methods, $controller, $guards);
        } else {
            $this->routes[] = new Route($path, $methods, $controller, $guards);
        }
    }

    public function call()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        unset($_GET['action']);
        $method = array_key_exists($_SERVER['REQUEST_METHOD'], self::METHODS)
            ? self::METHODS[$_SERVER['REQUEST_METHOD']]
            : 0;
        $matchedRoute = $this->matchRoutes($action, $method);
        $route = $matchedRoute[0];
        $params = $matchedRoute[1];

        $isAuthorized =  $this->verifyGuards($route);
        if (!$isAuthorized){
            $route = $this->getErrorPageRoute();
        }
        $controllerClass = $route->getController();
        new $controllerClass($method, $params, $_GET);
    }

    /**
     * @param $action
     * @param $method
     * @return array<Route, array<string>>
     */
    private function matchRoutes($action, $method){
        $params = [];
        $targetIndex = -1;
        foreach ($this->routes as $routeIndex => $route) {
            if (!in_array($method, $route->getMethods())) continue;
            $routePath = $route->getPath();
            if ($routePath === strtolower($action)) {
                $targetIndex = $routeIndex;
                break;
            }
            $routePathExploded = explode('/', $routePath);
            $actionExploded = explode('/', $action);
            if (count($routePathExploded) !== count($actionExploded)) continue;
            $isMatch = true;
            foreach ($routePathExploded as $nameIndex => $name){
                if($name === strtolower($actionExploded[$nameIndex])) continue;
                if (substr_compare($name, ':', 0, 1) === 0){
                    $params[substr($name, 1)] = $actionExploded[$nameIndex];
                    continue;
                }
                $isMatch = false;
                $params = [];
                break;
            }
            if ($isMatch){
                $targetIndex = $routeIndex;
                break;
            }
        }
        if ($targetIndex === -1){
            $route = $this->getErrorPageRoute();
        } else {
            $route = $this->routes[$targetIndex];
        }
        return [$route, $params];
    }

    /**
     * @param Route $route
     * @return bool
     */
    private function verifyGuards(Route $route){
        foreach($route->getGuards() as $guardClass){
            $guard = new $guardClass();
            if(!$guard->isAuthorized()){
                $_GET['errorMessage'] = $guard->getErrorMessage();
                return false;
            }
        }
        return true;
    }

    /**
     * @return Route
     */
    private function getErrorPageRoute() {
        return isset($this->routes['errorPage']) ? $this->routes['errorPage'] : $this->routes[0];
    }
}