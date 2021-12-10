<?php

namespace Acme\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity()]
class User
{

    public function __construct(int $id, ?string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    #[Column(type: 'bigInteger', primary: true)]
    public ?int $id = null;
    #[Column(type: 'string')]
    public ?string $name = null;

    #[HasMany(target: Comment::class, innerKey: ['id'], outerKey: ['user_id'], cascade: true )]
    public array $comments = [];
}