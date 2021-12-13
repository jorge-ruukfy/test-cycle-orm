<?php

namespace Acme\VO;

class Entry implements ValueObject
{
    use VOTypecast;

    protected function __construct(private string $value)
    {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function from(mixed $value): static
    {
        return new static($value);
    }
}