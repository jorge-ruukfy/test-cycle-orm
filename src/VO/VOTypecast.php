<?php

namespace Acme\VO;

trait VOTypecast
{
    public static function typecast($value): ?ValueObject
    {
        if ($value === null) {
            return null;
        }

        return static::from($value);
    }

    abstract public function __toString();
}