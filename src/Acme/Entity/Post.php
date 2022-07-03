<?php

namespace Acme\Entity;

use Acme\VO\Entry;
use Acme\VO\Id;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\ManyToMany;
use Cycle\ORM\Collection\Pivoted\PivotedCollection;
use Cycle\ORM\PromiseMapper\PromiseMapper;
use Cycle\ORM\Reference\Promise;
use Cycle\ORM\Reference\ReferenceInterface;

#[Entity(mapper: PromiseMapper::class)]
class Post
{

    #[ManyToMany(
        Comment::class,
        through: PostsComments::class,
        load: 'eager'
    )]
    private Promise|iterable $comments = [];

    public function __construct(
        #[Column(type: 'uuid', primary: true, typecast: Id::class)]
        private Id $id,
        #[Column(type: 'text', typecast: Entry::class)]
        private Entry $entry,
        #[BelongsTo(target: User::class, load: 'lazy')]
        public ReferenceInterface|User $user

    ) {
        $this->comments = new PivotedCollection();
    }

    public function getId(): Id
    {
        return $this->id;
    }


    public function getEntry(): ?Entry
    {
        return $this->entry;
    }


    public function getAuthor(): User|Promise
    {
        return $this->user;
    }

    public function getComments(): iterable|Promise
    {
        return $this->comments;
    }

    public function addComment(Comment $comment)
    {
//        $comments = clone $this->comments;
//        $comments->append($comment);
//        $this->comments= $comments;
    }
}