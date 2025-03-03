<?php

if (!function_exists('get_full_url')) {
    function get_full_url() :string {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] === 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];

        return $protocol . $host . $uri;
    }
}

if (!function_exists('router')) {
    function router(string $route, mixed $callback) :bool {
        $full_url        = get_full_url();
        $url_parts       = explode('/', trim(str_replace(BASE_URL, '', $full_url), '/'));
        $requested_route = implode('/', $url_parts);
        $route_regex     = preg_replace('/:[^\/]+/', '([^\/]+)', $route);

        if (preg_match("~^$route_regex$~", $requested_route, $matches)) {
            call_user_func_array($callback, array_slice($matches, 1));
            return true;
        }

        return false;
    }
}