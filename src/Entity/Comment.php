<?php

namespace Acme\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity()]
class Comment {
    #[Column(type: 'bigInteger')]
    public ?int $id = null;

    #[Column(type: 'bigInteger')]
    public ?int $user_id = null;

    #[Column(type: 'text', primary: true)]
    public ?string $comment = null;

    #[BelongsTo(User::class,'user_id','id')]
    public ?User $user = null;

    public function __construct(int $id, string $comment){
        $this->id = $id;
        $this->comment = $comment;

    }
}