<?php

define("DEBUG", 1); // какой режим откладки 1-все ошибки, 0-нет показывать
define("ROOT", dirname(__DIR__));  // корень
/* заметить что заканчиваются не на /, и значит что после констант str будут начинаться на / */
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/ishop/core');
define("LIBS", ROOT . '/vendor/ishop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'watches'); // шаблон


// http://ishop.loc/public/index.php - формирование страницы
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://ishop.loc/public/ - вырезали по шаблону наименование скрипта любые символы до / вырезаем
$app_path = preg_replace("#[^/]+$#", "", $app_path);
// http://ishop.loc - url главной страницы 
$app_path = str_replace("/public/", "", $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . '/admin');
require_once ROOT . '/vendor/autoload.php';
