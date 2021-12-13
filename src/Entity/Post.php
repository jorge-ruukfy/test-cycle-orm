<?php

namespace Acme\Entity;

use Acme\VO\Entry;
use Acme\VO\Id;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\ManyToMany;

#[Entity()]
class Post
{

    #[ManyToMany(Comment::class, 'id', 'id', 'post_id', 'comment_id', cascade: true, through: PostComment::class)]
    private array $comments = [];

    public function __construct(
        #[Column(type: 'bigInteger', primary: true, typecast: Id::class)]
        private Id $id,
        #[Column(type: 'text', typecast: Entry::class)]
        private Entry $entry,
        #[BelongsTo(User::class, 'user_id', 'id')]
        private User $author

    ) {
    }

    public function getId(): Id
    {
        return $this->id;
    }


    public function getEntry(): ?Entry
    {
        return $this->entry;
    }


    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function addComment(Comment $comment)
    {
        $this->comments=[...$this->getComments(),$comment];
    }
}