<?php

namespace BottomUpDDD\Common;

final class Util
{
    /**
     * @param object $objA
     * @param object $objB
     * @return boolean
     */
    public static function classEquals($objA, $objB): bool
    {
        return get_class($objA) === get_class($objB);
    }

    /**
     * @param object $obj
     * @return boolean
     */
    public static function isNullOrEmpty($obj): bool
    {
        return $obj === null || empty($obj);
    }

    /**
     * @return string
     */
    public static function guid(): string
    {
        return uniqid(
            date('YmdHis'),
            false
        );
    }
}
