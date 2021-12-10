<?php

use Acme\Entity\Comment;
use Acme\Entity\User;
use Cycle\ORM\Relation;
use Cycle\ORM\Schema;

return [
    User::class => [
        // ...
        Schema::PRIMARY_KEY => 'id',                          // <===
        Schema::COLUMNS => [
            'id' => 'id',
            'name' => 'name',
        ],
        Schema::RELATIONS => [
            'comments' => [
                Relation::TYPE => Relation::HAS_MANY,
                Relation::TARGET => Comment::class,
                Relation::SCHEMA => [
                    Relation::CASCADE => true,
                    Relation::INNER_KEY => 'id',                    // <===
                    Relation::OUTER_KEY => 'user_id',      // <===
                ],
            ]
        ]
    ],
];