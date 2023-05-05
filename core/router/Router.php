<?php

namespace core\router;

use src\lib\response\RedirectResponse;

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
        if (!$matchedRoute){
            $this->redirectToErrorPage('Erreur 404: page introuvable');
        }
        $route = $matchedRoute[0];
        $params = $matchedRoute[1];

        $isAuthorized =  $this->verifyGuards($route);
        if (!$isAuthorized){
            $this->redirectToErrorPage("Vous n'êtes pas autorisé à consulter cette page");
        }
        $controllerClass = $route->getController();
        $_GET['currentPath'] = $route->getPath();
        new $controllerClass($method, $params, $_GET);
    }

    /**
     * @param $action
     * @param $method
     * @return array<Route, array<string>>|null
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
                $arrayName = str_split($name);
                if ($arrayName[0] === ':'){
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
           return null;
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

    private function redirectToErrorPage($message) {
        $errorRoute = isset($this->routes['errorPage']) ? $this->routes['errorPage'] : $this->routes[0];;
        $path = $errorRoute->getPath() === '' ? '/' : $errorRoute->getPath();
        new RedirectResponse([$message], $path, false);

    }
}