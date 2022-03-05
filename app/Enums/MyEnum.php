<?php

namespace App\Enums;

trait MyEnum
{
    public static function __callStatic($name, $args)
    {
        $cases = static::cases();

        foreach ($cases as $case) {
            if ($case->name === $name) {
                return $case->value;
            }
        }
    }

    public static function values(): array
    {
        return array_column(static::cases(), 'value');
    }
}
