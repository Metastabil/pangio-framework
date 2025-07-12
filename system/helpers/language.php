<?php

/**
 * @author Julius Derigs
 * @version 1.0.0
 */


use Symfony\Component\Yaml\Yaml;

if (!function_exists('get_language')) {
    /**
     * @param string $locale
     * @return object
     * @throws JsonException
     */
    function get_language(string $locale = 'de'): object {
        $filepath = dirname(__DIR__, 2) . '/languages/' . $locale . '.yaml';

        if (!is_file($filepath)) {
            die("Missing language file: $filepath");
        }

        $languageArray = Yaml::parseFile($filepath);

        return json_decode(json_encode($languageArray, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR);
    }
}