<?php

if (!@include __DIR__ . './../vendor/autoload.php') {
    die("You must set up the project dependencies, run the following commands:
wget http://getcomposer.org/composer.phar
php composer.phar install
");
}

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'Xi\Bundle\TagBundle\\') &&
        file_exists($file = __DIR__ . '/../' . implode('/', array_slice(explode('\\', $class), 3)) . '.php')
    ) {
        require_once $file;
    }
});