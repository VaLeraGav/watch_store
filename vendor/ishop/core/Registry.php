<?php

namespace ishop;

// создается в libs/App.php
class Registry
{
    use TSingletone;
    protected static $properties = []; // хранит свойства 

    // обращение к массиву
    public function getProperty($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    // положить в массив
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    // вывод всех свойств
    public function getProperties()
    {
        return self::$properties;
    }
}
