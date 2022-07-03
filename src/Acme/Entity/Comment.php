<?php

namespace Acme\Entity;

use Acme\VO\Comment as CommentVO;
use Acme\VO\Id;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\ORM\PromiseMapper\PromiseMapper;
use Cycle\ORM\Reference\Promise;

#[Entity(mapper: PromiseMapper::class)]
class Comment
{


    public function __construct(
        #[Column(type: 'uuid', primary: true, typecast: Id::class)]
        private Id $id,
        #[Column(type: 'text', typecast: CommentVO::class)]
        private ?CommentVO $comment,
        #[BelongsTo(User::class, 'user_id', 'id')]
        private User|Promise $user
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