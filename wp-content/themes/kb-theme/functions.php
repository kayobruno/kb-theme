<?php

spl_autoload_register(function ($class) {
    $class_name = strtolower(str_replace('_', '-', $class));
    $path = __DIR__ . "/includes/{$class_name}.class.php";

    if (file_exists($path)) {
        require_once $path;
    }
});

$theme = new KB_Theme(new KB_Theme_Loader());
$theme->run();
