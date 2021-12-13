<?php

namespace Acme\Entity;

use Acme\Collection\SimpleCollection;
use Acme\VO\Id;
use Acme\VO\Name;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity()]
class User
{

    public function __construct(
        #[Column(type: 'bigInteger', primary: true, typecast: Id::class)]
        private Id $id,
        #[Column(type: 'string', typecast: Name::class)]
        private ?Name $name
    ) {
        $this->comments = new SimpleCollection();
    }

    #[HasMany(target: Comment::class, innerKey: ['id'], outerKey: ['user_id'], cascade: true, collection: SimpleCollection::class)]
    private iterable $comments;


    public function id(): Id
    {
        return $this->id;
    }


    public function getName(): ?Name
    {
        return $this->name;
    }


    public function getComments(): SimpleCollection
    {
        return $this->comments;
    }
}