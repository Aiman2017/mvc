<?php

class RequestURL
{
    protected static function setURL()
    {
        // here we are getting the url
        return explode('/', trim($_GET['url'] ?? 'home', '/'), '3');
    }

    public static function getURL()
    {
        return self::setURL();
    }

}