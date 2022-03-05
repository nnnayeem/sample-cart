<?php

if (!function_exists('get_badge_class')) {
    function get_badge_class(string $value, array $classMapping, ?string $default = null)
    {
        return array_key_exists($value, $classMapping)?$classMapping[$value]:($default??'info');
    }
}
