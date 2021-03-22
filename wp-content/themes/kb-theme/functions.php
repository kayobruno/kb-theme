<?php

if (!function_exists('dd')) {
    /**
     * Var_dump and die method
     *
     * @param $data
     * @return void
     */
    function dd($data)
    {
        ini_set("highlight.comment", "#969896; font-style: italic");
        ini_set("highlight.default", "#FFFFFF");
        ini_set("highlight.html", "#D16568");
        ini_set("highlight.keyword", "#7FA3BC; font-weight: bold");
        ini_set("highlight.string", "#F2C47E");

        $output = highlight_string("<?php\n\n" . var_export($data, true), true);

        echo "<div style=\"background-color: #1C1E21; padding: 1rem\">{$output}</div>";
        die;
    }
}

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
