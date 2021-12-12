<?php

namespace Acme\Entity;

use Acme\VO\Comment as CommentVO;
use Acme\VO\Id;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\ORM\Mapper\PromiseMapper;

#[Entity(mapper: PromiseMapper::class)]
class Comment
{

    #[BelongsTo(User::class, 'user_id', 'id')]
    private ?User $user = null;

    public function __construct(
        #[Column(type: 'bigInteger', typecast: Id::class)]
        private Id $id,
        #[Column(type: 'text', primary: true, typecast: CommentVO::class)]
        private ?CommentVO $comment
    ) {
    }

    public function getId(): Id
    {
        return $this->id;
    }


    public function getComment(): ?CommentVO
    {
        return $this->comment;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }
}