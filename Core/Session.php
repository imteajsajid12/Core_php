<?php

namespace Core;

class Session
{


    public function __construct()
    {
    }

    public static function flash($key = 'null', $value = [])
    {

        $_SESSION['__flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['__flash']);
    }

    public static function get($key, $DELETE = null)
    {

        if (!isset($_SESSION['__flash'])) {
            return null;
        } elseif (isset($_SESSION['__flash'][$key])) {
            $message = $_SESSION['__flash'][$key];
            unset($_SESSION['__flash'][$key]);
            return $message;
        }
    }

    public static  function Message($key, $value)
    {
        $_SESSION['__flash'][$key] = $value;
    }


}