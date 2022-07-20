<?php

namespace ishop;

trait TSingletone
{
    private static $instance; // свойство
    public static function instance()
    {
        // заполняем объектом если его там нет
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
