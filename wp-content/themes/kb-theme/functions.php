<?php

/**
 * Plugins extras do ACF
 */
$acf_plugins = array(
    'plugins/acf-gallery/acf-gallery.php',
    'plugins/acf-options-page/acf-options-page.php',
    'plugins/acf-repeater/acf-repeater.php',
);

foreach ($acf_plugins as $plugin) {
    if (!$plugin_path = locate_template($plugin)) {
        error_log(sprintf(__('Error locating %s for inclusion'), $plugin), E_USER_ERROR);
    }
    include_once "{$plugin_path}";
}

spl_autoload_register(function ($class) {
    $class_name = strtolower(str_replace('_', '-', $class));
    $path = __DIR__ . "/includes/{$class_name}.class.php";

    if (file_exists($path)) {
        require_once $path;
    }
});

$theme = new KB_Theme(new KB_Theme_Loader());
$theme->run();
