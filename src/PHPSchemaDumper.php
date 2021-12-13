<?php

namespace Acme;

use Cycle\ORM\Relation;
use Cycle\ORM\Schema;

class PHPSchemaDumper
{

    private static function constants($className, bool $fullRef = true): ?array
    {
        if (class_exists($className)) {
            return array_map(
                fn($i) => $fullRef ? sprintf("%s::%s", $className, $i) : $i,
                array_flip((new \ReflectionClass($className))->getConstants())
            );
        }
        return null;
    }

    private static function walk(array $array, callable $callable, mixed $userData = null)
    {
        return array_reduce(array_keys($array), function ($c, $key) use ($array, $callable, $userData) {
            $value = $array[$key];
            $callable($value, $key, $userData);
            $c[$key] = $value;
            return $c;
        }, []);
    }

    private static function exportArray($expression, bool $return = false): ?string
    {
        $export = var_export($expression, true);
        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);
        $export = join(PHP_EOL, array_filter(["["] + $array));
        if (!$return) {
            echo $export;
            return null;
        } else {
            return $export;
        }
    }

    private static function reflectSchema($schema): array
    {
        return self::walk($schema, function (&$value, &$key, $userData) {
            $value = self::walk($value, function (&$value, &$key, $userData) {
                $key = $userData[$key];
                if ($key === 'Cycle\ORM\Schema::RELATIONS') {
                    $value = self::walk($value, function (&$value, &$key, $userData) {
                        $value = self::walk($value, function (&$value, &$key, $userData) {
                            $key = $userData[$key];
                            if ($key === 'Cycle\ORM\Relation::SCHEMA') {
                                $value = self::walk($value, function (&$value, &$key, $userData) {
                                    $key = $userData[$key];
                                }, $userData);
                            }
                        }, self::constants(Relation::class));
                    });
                }
            }, self::constants(Schema::class));
        });
    }

    public static function dump(array $schema, ?string $output = null): string
    {
        $dump = self::exportArray(self::reflectSchema($schema), true);
        $dump = preg_replace_callback(
            '@\'([\w\\\\]+::[\w]+)\'@s',
            fn($matches) => '\\' . stripslashes($matches[1]),
            $dump
        );

        if ($output) {
            file_put_contents($output, '<?php ' . PHP_EOL . 'return ' . $dump . ';');
        }

        return $dump;
    }


}