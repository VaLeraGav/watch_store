<?php

namespace app\controllers;

use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{
    public function indexAction()
    {
        $posts = R::findAll('test');
        //d($this->route);
        //$this->setMeta(App::$app->getProperty('shop_name'),"Описание", "Ключевики");
        $this->setMeta("Главная страница", "Описание", "Ключевики");
        $name = 'андрей';
        $age = '39';
        $names = ['Паша', "Вася", "Петzz"];
        $cache = Cache::instance();
        //$cache->set('test',$names, 30);
        $this->set(compact('name', 'age', 'names', 'posts'));
    }
}
