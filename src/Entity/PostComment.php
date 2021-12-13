<?php

namespace Acme\Entity;

use Acme\VO\Id;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity()]
class PostComment
{
    #[Column(type: 'bigInteger', primary: true, typecast: Id::class)]
    private Id $post_id;
    #[Column(type: 'bigInteger', primary: true, typecast: Id::class)]
    private Id $comment_id;


}