<?php

namespace ishop\base;

abstract class Controller
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = ['title' => '', 'keywords' => '', 'desk' => ''];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller']; // тоже имя что и у контроллера
        $this->view = $route['action']; // сделано потому что в папке view есть своя папка для контроллера и в них храняться виды для каждого
        $this->prefix = $route['prefix'];
    }

    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $desk = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desk'] = $desk;
        $this->meta['keywords'] = $keywords;
    }
}
