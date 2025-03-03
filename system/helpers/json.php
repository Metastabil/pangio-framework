<?php

if (!function_exists('array_to_json')) {
    function array_to_json(array $array) :string {
        try {
            return json_encode($array, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $exception) {
            if (ENVIRONMENT === 'development') {
                die($exception->getMessage());
            }

            return '';
        }
    }
}

if (!function_exists('json_to_array')) {
    function json_to_array(string $json) :array {
        try {
            return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $exception) {
            if (ENVIRONMENT === 'development') {
                die($exception->getMessage());
            }

            return [];
        }
    }
}