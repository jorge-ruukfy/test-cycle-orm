<?php

namespace Acme\Entity;


use Acme\VO\Id;
use Acme\VO\Name;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\HasMany;
use Cycle\ORM\PromiseMapper\PromiseMapper;
use Cycle\ORM\Reference\Promise;

#[Entity(mapper: PromiseMapper::class)]
class User
{

    public function __construct(
        #[Column(type: 'uuid', primary: true, typecast: Id::class)]
        private Id $id,
        #[Column(type: 'string', typecast: Name::class)]
        private ?Name $name
    ) {

    }

    #[HasMany(target: Comment::class, innerKey: ['id'], outerKey: ['user_id'], cascade: true)]
    private Promise|iterable $comments=[];


    public function getId(): Id
    {
        return $this->id;
    }


    public function getName(): ?Name
    {
        return $this->name;
    }


    public function getComments()
    {

        return $this->comments;
    }
}