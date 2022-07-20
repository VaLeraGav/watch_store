<?php

namespace ishop\base;

use ishop\Db;

abstract class Model
{
    public $attributes = []; // массив свойств модели 
    public $error = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }
}
