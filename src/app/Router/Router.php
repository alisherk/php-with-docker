<?php

declare(strict_types=1);

namespace App\Router;

use App\Exceptions\RouteNotFoundException;

class Router {
    private array $routes = [];

    public function __construct() {

    }

    public function register(string $method, string $route, callable |array $action): self {
        $this->routes[$method][$route] = $action;

        return $this;
    }

    public function get(string $route, callable |array $action): self {
        $this->register("get", $route, $action);

        return $this;
    }

    public function post(string $route, callable |array $action): self {
        return $this->register("post", $route, $action);
    }

    public function routes(): array {
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod) {
        $route = "";

        if ( str_contains($requestUri, "?") ) {
            $route = explode("?", $requestUri)[0];

            $route = "/" . explode("/", $route)[2];

        } else {
            $path = parse_url($requestUri, PHP_URL_PATH);
            $segments = explode('/', $path);
            $segments = array_slice($segments, 1);
            $route = '/' . implode('/', $segments);

            if ( $route === null ) {
                $route = "/";
            }
        }
        $action = $this->routes[$requestMethod][$route] ?? null;

        if ( !$action ) {
            throw new RouteNotFoundException();
        }

        if ( is_callable($action) ) {
            return call_user_func($action);
        }

        if ( is_array($action) ) {
            [$class, $method] = $action;

            if ( method_exists($class, $method) ) {
                $controller = new $class();

                return $controller->$method();
            }
        }
    }
}