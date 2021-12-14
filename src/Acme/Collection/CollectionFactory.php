<?php

namespace Acme\Collection;


class CollectionFactory
{
    private static array $registry;

    public static function register($alias, callable $factory)
    {
        self::$registry[$alias] = $factory;
    }

    public static function make($name, ...$arguments)
    {
        if ($callable = self::$registry[$name] ?? null) {
            return $callable(...$arguments);
        }
        throw new \RuntimeException('No alias registered');
    }
}