<?php

namespace App\Utilities;

class Base62
{
    private const CHARSET = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function encode(int $number): string
    {
        if ($number === 0) {
            return self::CHARSET[0];
        }

        $result = '';
        while ($number > 0) {
            $remainder = $number % 62;
            $result .= self::CHARSET[$remainder];
            $number = intdiv($number, 62);
        }

        return strrev($result);
    }

    public static function decode(string $base62): int
    {
        $number = 0;
        $charset = array_flip(str_split(self::CHARSET));

        foreach (str_split($base62) as $char) {
            $number = $number * 62 + $charset[$char];
        }

        return $number;
    }
}
