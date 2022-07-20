<?php

use ishop\Router;

require_once dirname(__DIR__)  . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

new \ishop\App();

//d(\ishop\Router::getRoutes());
