<?php

namespace ishop;

class Router
{
    protected static $routes = []; // таблица маршрутов
    protected static $route = []; // текущий маршрут после того как определелили что он есть 

    // записывает правило 
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    // вызывает контроллер 
    public static function dispatch($url)
    {

        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод $controller::$action не найден ", 404);
                }
            } else {
                throw new \Exception("контроллер $controller не найден ", 404);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    // ищет соответствие 
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                // добавление \ 
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    // MainIndex
    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    // mainIndex
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    public static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('?', $url, 2);
            // $params = explode('&', $url, 2);
            if (false === strpos($params[0], "=")) {
                return rtrim($params[0], "/");
            }
        }
    }
}
