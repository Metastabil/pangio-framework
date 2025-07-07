<?php
namespace System\Classes;

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

class Request {
    /**
     * @param string $method
     * @return bool
     */
    public function is(string $method) :bool {
        $request_method = strtolower($_SERVER['REQUEST_METHOD']);

        return $request_method === strtolower($method);
    }

    /**
     * @param string $name
     * @param string $method
     * @return array|string
     */
    public function get(string $name, string $method = 'post') :array|string {
        if (strtolower($method) === 'post') {
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

    /**
     * @param array $fields
     * @param string $method
     * @return bool
     */
    public function validate(array $fields, string $method = 'post') :bool {
        $present = true;

        if ($method === 'post') {
            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $present = false;
                }
            }
        }

        if ($method === 'get') {
            foreach ($fields as $field) {
                if (empty($_GET[$field])) {
                    $present = false;
                }
            }
        }

        return $present;
    }
}