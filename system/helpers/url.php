<?php
use JetBrains\PhpStorm\NoReturn;

if (!function_exists('base_url')) {
    function base_url(string $uri = '') :string {
        return BASE_URL . $uri;
    }
}

if (!function_exists('redirect')) {
    #[NoReturn] function redirect(string $url) :void {
        header('Location: ' . $url);
        exit;
    }
}