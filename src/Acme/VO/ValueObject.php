<?php

namespace Acme\VO;

interface ValueObject extends \Stringable
{
    public static function from(mixed $value): static;
}