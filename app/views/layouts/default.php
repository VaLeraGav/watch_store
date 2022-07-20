<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->getMeta(); ?>
</head>

<body>
    <h1>Шаблон Default</h1>
    <?= $content; ?>
    <?php

    // вывод количества запросов 
    // use RedBeanPHP\R;
    // $logs = R::getDatabaseAdapter()
    //     ->getDatabase()
    //     ->getLogger();
    // d($logs->grep('SELECT'));
    ?>
</body>

</html>