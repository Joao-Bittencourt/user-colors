<?php

namespace UserColors;

use Exception;

class Router
{
    private $routes = [];
    private $params = [];

    public function addRoute($method, $path, $handler)
    {
        $this->routes[$method][$path] = $handler;
    }

    public function handleRequest($method, $path)
    {
        try {
            $this->execute($method, $path);
        } catch (Exception $e) {
            
            var_dump($e->getMessage());
        }
        return;        
    }

    private function execute($method, $path) {

        foreach ($this->routes[$method] as $route => $handler) {
            
            if ($this->routeMatches($route, $path)) {
                $this->executeHandler($handler);
                return;
            }
        }

        throw new \Exception("Not Found.", 404);
    }

    private function routeMatches($route, $path)
    {

        $routePattern = preg_replace('/\{(\w+)\}/', '(?P<$1>\w+)', $route);
        $routePattern = str_replace('/', '\/', $routePattern);
        $routePattern = '/^' . $routePattern . '$/';

        if (preg_match($routePattern, $path, $matches)) {
            $this->params = $matches;
            return true;
        }

        return false;
    }

    private function executeHandler($handler)
    {

        list($controller, $action) = explode('@', $handler);

        if (empty($controller)) {
            throw new \Exception("Controller not exists.", 404);
        }

        if (!class_exists("\UserColors\Controllers\\$controller")) {
            throw new \Exception("{$controller} not exists.", 404);
        }

        $controllerWithNameSpace = "\UserColors\Controllers\\$controller";
        $controllerInstance = new $controllerWithNameSpace();

        if (!method_exists($controllerInstance, $action)) {
            throw new \Exception("{$action} not exists in {$controller}", 404);
        }

        $controllerInstance->$action(...$this->params);
    }
}
