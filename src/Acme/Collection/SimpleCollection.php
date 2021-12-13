<?php

namespace Acme\Collection;

use ArrayObject;
use Cycle\ORM\Collection\CollectionFactoryInterface;

class SimpleCollection extends ArrayObject implements CollectionFactoryInterface
{
    public function __construct($array = [], $flags = 0, $iteratorClass = "ArrayIterator")
    {
        parent::__construct($array, $flags, $iteratorClass);
    }

    public function withCollectionClass(string $class): static
    {
        // TODO: Implement withCollectionClass() method.
    }

    public function collect(iterable $data): iterable
    {
        return $this;
    }
}