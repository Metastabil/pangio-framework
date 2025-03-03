<?php

if (!function_exists('is_post')) {
    function is_post() :bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}

if (!function_exists('is_get')) {
    function is_get() :bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}

if (!function_exists('get_input')) {
    function get_input(string $name, string $method = 'POST') :string|array {
        if ($method === 'POST') {
            if (is_array($_POST[$name])) {
                return $_POST[$name];
            }

            return (string)$_POST[$name];
        }

        if (is_array($_GET[$name])) {
            return $_GET[$name];
        }

        return (string)$_GET[$name];
    }
}

if (!function_exists('check_required_fields')) {
    function check_required_fields(array $fields, string $method = 'POST') :bool {
        $present = true;

        if ($method === 'POST') {
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $present = false;
                }
            }
        }

        if ($method === 'GET') {
            foreach ($fields as $field) {
                if (empty($_GET[$field])) {
                    $present = false;
                }
            }
        }

        return $present;
    }
}