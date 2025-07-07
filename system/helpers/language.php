<?php

use Symfony\Component\Yaml\Yaml;

if (!function_exists('get_language')) {
    function get_language(string $locale = 'de'): object {
        $filepath = dirname(__DIR__, 2) . '/languages/' . $locale . '.yaml';

        if (!is_file($filepath)) {
            die("Missing language file: $filepath");
        }

        // Parse the YAML file and convert the array to an object
        $languageArray = Yaml::parseFile($filepath);

        return json_decode(json_encode($languageArray, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR);
    }
}