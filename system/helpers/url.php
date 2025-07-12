<?php

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

use JetBrains\PhpStorm\NoReturn;

if (!function_exists('base_url')) {
    /**
     * @param string $uri
     * @return string
     */
    function base_url(string $uri = '') :string {
        return BASE_URL . $uri;
    }
}

if (!function_exists('redirect')) {
    /**
     * @param string $url
     * @return void
     */
    #[NoReturn] function redirect(string $url) :void {
        if (str_contains($url, 'http')) {
            header('Location: ' . $url);
            exit;
        }

        header('Location: ' . base_url($url));
        exit;
    }
}