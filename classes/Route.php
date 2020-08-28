<?php
class Route
{
    public static $validRoutes = array();

    public static function set($route, $funciton)
    {
        self::$validRoutes[] = $route;

        if ($_GET['url'] == $route) {
            $funciton->__invoke();
        }
    }
}
