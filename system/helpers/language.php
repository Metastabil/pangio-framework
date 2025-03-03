<?php

if (!function_exists('get_language')) {
    function get_language(string $locale = 'de') :array {
        $filepath = dirname(__DIR__, 2) . '/languages/' . $locale . '.php';

        if (!is_file($filepath)) {
            die("Missing language file: $filepath");
        }

        return require $filepath;
    }
}