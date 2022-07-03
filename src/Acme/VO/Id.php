<?php

namespace Acme\VO;


use Webmozart\Assert\Assert;

class Id implements ValueObject
{
    use VOTypecast;

    protected function __construct(private string $value)
    {
    }


    public function value(): string
    {
        return $this->value;
    }

    public static function from(mixed $value): static
    {
        Assert::uuid($value);
        return new static($value);
    }

    public function __toString(): string
    {
        return $this->value();
    }
}