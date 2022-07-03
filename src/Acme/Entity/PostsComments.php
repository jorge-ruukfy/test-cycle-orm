<?php

namespace Acme\Entity;

use Acme\VO\Id;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\ORM\PromiseMapper\PromiseMapper;

#[Entity(mapper: PromiseMapper::class, table: 'posts_x_comments')]
class PostsComments
{
    #[Column(type: 'uuid', primary: true, typecast: Id::class)]
    private Id $post_id;
    #[Column(type: 'uuid', primary: true, typecast: Id::class)]
    private Id $comment_id;
}