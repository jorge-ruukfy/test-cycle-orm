<?php 
return [
    'comment' => [
        \Cycle\ORM\Schema::ENTITY => 'Acme\\Entity\\Comment',
        \Cycle\ORM\Schema::MAPPER => 'Cycle\\ORM\\Mapper\\Mapper',
        \Cycle\ORM\Schema::SOURCE => 'Cycle\\ORM\\Select\\Source',
        \Cycle\ORM\Schema::REPOSITORY => 'Cycle\\ORM\\Select\\Repository',
        \Cycle\ORM\Schema::DATABASE => 'default',
        \Cycle\ORM\Schema::TABLE => 'comments',
        \Cycle\ORM\Schema::PRIMARY_KEY => [
            0 => 'id',
        ],
        \Cycle\ORM\Schema::FIND_BY_KEYS => [
            0 => 'id',
        ],
        \Cycle\ORM\Schema::COLUMNS => [
            'id' => 'id',
            'comment' => 'comment',
            'user_id' => 'user_id',
        ],
        \Cycle\ORM\Schema::RELATIONS => [
            'user' => [
                \Cycle\ORM\Relation::TYPE => 12,
                \Cycle\ORM\Relation::EMBEDDED => 'user',
                \Cycle\ORM\Relation::LOAD => 10,
                \Cycle\ORM\Relation::SCHEMA => [
                    \Cycle\ORM\Relation::CASCADE => true,
                    \Cycle\ORM\Relation::NULLABLE => false,
                    \Cycle\ORM\Relation::INNER_KEY => 'user_id',
                    \Cycle\ORM\Relation::OUTER_KEY => 'id',
                ],
            ],
        ],
        \Cycle\ORM\Schema::SCOPE => NULL,
        \Cycle\ORM\Schema::TYPECAST => [
            'id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
            'comment' => [
                0 => 'Acme\\VO\\Comment',
                1 => 'typecast',
            ],
            'user_id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
        ],
        \Cycle\ORM\Schema::SCHEMA => [
        ],
        \Cycle\ORM\Schema::TYPECAST_HANDLER => NULL,
    ],
    'postComment' => [
        \Cycle\ORM\Schema::ENTITY => 'Acme\\Entity\\PostComment',
        \Cycle\ORM\Schema::MAPPER => 'Cycle\\ORM\\Mapper\\Mapper',
        \Cycle\ORM\Schema::SOURCE => 'Cycle\\ORM\\Select\\Source',
        \Cycle\ORM\Schema::REPOSITORY => 'Cycle\\ORM\\Select\\Repository',
        \Cycle\ORM\Schema::DATABASE => 'default',
        \Cycle\ORM\Schema::TABLE => 'post_comments',
        \Cycle\ORM\Schema::PRIMARY_KEY => [
            0 => 'post_id',
            1 => 'comment_id',
        ],
        \Cycle\ORM\Schema::FIND_BY_KEYS => [
            0 => 'post_id',
            1 => 'comment_id',
        ],
        \Cycle\ORM\Schema::COLUMNS => [
            'post_id' => 'post_id',
            'comment_id' => 'comment_id',
        ],
        \Cycle\ORM\Schema::RELATIONS => [
        ],
        \Cycle\ORM\Schema::SCOPE => NULL,
        \Cycle\ORM\Schema::TYPECAST => [
            'post_id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
            'comment_id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
        ],
        \Cycle\ORM\Schema::SCHEMA => [
        ],
        \Cycle\ORM\Schema::TYPECAST_HANDLER => NULL,
    ],
    'user' => [
        \Cycle\ORM\Schema::ENTITY => 'Acme\\Entity\\User',
        \Cycle\ORM\Schema::MAPPER => 'Cycle\\ORM\\Mapper\\Mapper',
        \Cycle\ORM\Schema::SOURCE => 'Cycle\\ORM\\Select\\Source',
        \Cycle\ORM\Schema::REPOSITORY => 'Cycle\\ORM\\Select\\Repository',
        \Cycle\ORM\Schema::DATABASE => 'default',
        \Cycle\ORM\Schema::TABLE => 'users',
        \Cycle\ORM\Schema::PRIMARY_KEY => [
            0 => 'id',
        ],
        \Cycle\ORM\Schema::FIND_BY_KEYS => [
            0 => 'id',
        ],
        \Cycle\ORM\Schema::COLUMNS => [
            'id' => 'id',
            'name' => 'name',
        ],
        \Cycle\ORM\Schema::RELATIONS => [
            'comments' => [
                \Cycle\ORM\Relation::TYPE => 11,
                \Cycle\ORM\Relation::EMBEDDED => 'comment',
                \Cycle\ORM\Relation::LOAD => 10,
                \Cycle\ORM\Relation::SCHEMA => [
                    \Cycle\ORM\Relation::CASCADE => true,
                    \Cycle\ORM\Relation::NULLABLE => false,
                    \Cycle\ORM\Relation::WHERE => [
                    ],
                    \Cycle\ORM\Relation::ORDER_BY => [
                    ],
                    \Cycle\ORM\Relation::INNER_KEY => [
                        0 => 'id',
                    ],
                    \Cycle\ORM\Relation::OUTER_KEY => [
                        0 => 'user_id',
                    ],
                    \Cycle\ORM\Relation::COLLECTION_TYPE => NULL,
                ],
            ],
        ],
        \Cycle\ORM\Schema::SCOPE => NULL,
        \Cycle\ORM\Schema::TYPECAST => [
            'id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
            'name' => [
                0 => 'Acme\\VO\\Name',
                1 => 'typecast',
            ],
        ],
        \Cycle\ORM\Schema::SCHEMA => [
        ],
        \Cycle\ORM\Schema::TYPECAST_HANDLER => NULL,
    ],
    'post' => [
        \Cycle\ORM\Schema::ENTITY => 'Acme\\Entity\\Post',
        \Cycle\ORM\Schema::MAPPER => 'Cycle\\ORM\\Mapper\\Mapper',
        \Cycle\ORM\Schema::SOURCE => 'Cycle\\ORM\\Select\\Source',
        \Cycle\ORM\Schema::REPOSITORY => 'Cycle\\ORM\\Select\\Repository',
        \Cycle\ORM\Schema::DATABASE => 'default',
        \Cycle\ORM\Schema::TABLE => 'posts',
        \Cycle\ORM\Schema::PRIMARY_KEY => [
            0 => 'id',
        ],
        \Cycle\ORM\Schema::FIND_BY_KEYS => [
            0 => 'id',
        ],
        \Cycle\ORM\Schema::COLUMNS => [
            'id' => 'id',
            'entry' => 'entry',
            'user_id' => 'user_id',
        ],
        \Cycle\ORM\Schema::RELATIONS => [
            'comments' => [
                \Cycle\ORM\Relation::TYPE => 14,
                \Cycle\ORM\Relation::EMBEDDED => 'comment',
                \Cycle\ORM\Relation::LOAD => 10,
                \Cycle\ORM\Relation::SCHEMA => [
                    \Cycle\ORM\Relation::CASCADE => true,
                    \Cycle\ORM\Relation::NULLABLE => false,
                    \Cycle\ORM\Relation::WHERE => [
                    ],
                    \Cycle\ORM\Relation::ORDER_BY => [
                    ],
                    \Cycle\ORM\Relation::INNER_KEY => 'id',
                    \Cycle\ORM\Relation::OUTER_KEY => 'id',
                    \Cycle\ORM\Relation::THROUGH_ENTITY => 'postComment',
                    \Cycle\ORM\Relation::THROUGH_INNER_KEY => [
                        0 => 'post_id',
                    ],
                    \Cycle\ORM\Relation::THROUGH_OUTER_KEY => [
                        0 => 'comment_id',
                    ],
                    \Cycle\ORM\Relation::THROUGH_WHERE => [
                    ],
                    \Cycle\ORM\Relation::COLLECTION_TYPE => NULL,
                ],
            ],
            'author' => [
                \Cycle\ORM\Relation::TYPE => 12,
                \Cycle\ORM\Relation::EMBEDDED => 'user',
                \Cycle\ORM\Relation::LOAD => 10,
                \Cycle\ORM\Relation::SCHEMA => [
                    \Cycle\ORM\Relation::CASCADE => true,
                    \Cycle\ORM\Relation::NULLABLE => false,
                    \Cycle\ORM\Relation::INNER_KEY => 'user_id',
                    \Cycle\ORM\Relation::OUTER_KEY => 'id',
                ],
            ],
        ],
        \Cycle\ORM\Schema::SCOPE => NULL,
        \Cycle\ORM\Schema::TYPECAST => [
            'id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
            'entry' => [
                0 => 'Acme\\VO\\Entry',
                1 => 'typecast',
            ],
            'user_id' => [
                0 => 'Acme\\VO\\Id',
                1 => 'typecast',
            ],
        ],
        \Cycle\ORM\Schema::SCHEMA => [
        ],
        \Cycle\ORM\Schema::TYPECAST_HANDLER => NULL,
    ],
];