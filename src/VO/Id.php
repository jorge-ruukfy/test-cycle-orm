<?php

namespace Acme\VO;


class Id implements ValueObject
{
    use VOTypecast;

    protected function __construct(private int $value)
    {
    }


    public function value(): int
    {
        return $this->value;
    }

    public static function from(mixed $value):static
    {
        return new static($value);
    }

    public function __toString()
    {
        return (string)$this->value();
    }
}