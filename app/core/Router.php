<?php

class Router
{
    protected static $controller = '_404';
    protected static $method = 'index';
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    protected static function router($url)
    {
        $fileName = '../app/controllers/' . ucfirst($url[0]) . '.php';
        if (file_exists($fileName)) {
             require_once $fileName;
             self::$controller = $url[0];
             unset($url[0]);
        }else {
            require_once '../app/controllers/' . self::$controller  . '.php';
        }

        $controller = new self::$controller();
        $method = $url[1] ?? self::$method;
        if (!empty($url[1])) {
            if (method_exists($controller, $method)) {
                self::$method = $method;
                unset($url[1]);
            }
        }
        $url = array_values($url);
       return call_user_func_array([$controller, self::$method], []);
    }

    public static function getRouter($url)
    {
        return self::router($url);
    }
}