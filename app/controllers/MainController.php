<?php

namespace app\controllers;

use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta("Главная страница", "Описание", "Ключевики");
    }
}
