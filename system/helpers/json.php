<?php

use JetBrains\PhpStorm\NoReturn;

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

if (!function_exists('respond_with_json')) {
    function respond_with_json(int $statuscode, string $json) :void {
        http_response_code($statuscode);
        header('Content-Type: application/json');
        echo $json;
    }
}

if (!function_exists('respond_with_500')) {
    #[NoReturn] function respond_with_500(): void {
        respond_with_json(500, array_to_json([
            'success' => false,
            'message' => esc(LANG['messages']['errors']['unknown_error']),
            'data' => []
        ]));

        exit;
    }
}

if (!function_exists('respond_with_400')) {
    #[NoReturn] function respond_with_400(string $message, array $data = []) :void {
        respond_with_json(400, array_to_json([
            'success' => true,
            'message' => esc($message),
            'data' => $data
        ]));

        exit;
    }
}


if (!function_exists('respond_with_200')) {
    #[NoReturn] function respond_with_200(string $message, array $data = []) :void {
        respond_with_json(200, array_to_json([
            'success' => true,
            'message' => esc($message),
            'data' => $data
        ]));

        exit;
    }
}