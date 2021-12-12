<?php

namespace Acme\Entity;

use Acme\VO\Id;
use Acme\VO\Name;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\HasMany;
use Cycle\ORM\Mapper\PromiseMapper;

#[Entity(mapper: PromiseMapper::class)]
class User
{

    public function __construct(
        #[Column(type: 'bigInteger', primary: true, typecast: Id::class)]
        private Id $id,
        #[Column(type: 'string', typecast: Name::class)]
        private ?Name $name
    ) {
    }

    #[HasMany(target: Comment::class, innerKey: ['id'], outerKey: ['user_id'], cascade: true, load: 'eager')]
    private array $comments = [];


    public function id(): Id
    {
        return $this->id;
    }


    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }
}