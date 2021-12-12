<?php 
return [
    'comment' => [
        \Cycle\ORM\Schema::ENTITY => 'Acme\\Entity\\Comment',
        \Cycle\ORM\Schema::MAPPER => 'Cycle\\ORM\\Mapper\\PromiseMapper',
        \Cycle\ORM\Schema::SOURCE => 'Cycle\\ORM\\Select\\Source',
        \Cycle\ORM\Schema::REPOSITORY => 'Cycle\\ORM\\Select\\Repository',
        \Cycle\ORM\Schema::DATABASE => 'default',
        \Cycle\ORM\Schema::TABLE => 'comments',
        \Cycle\ORM\Schema::PRIMARY_KEY => [
            0 => 'comment',
        ],
        \Cycle\ORM\Schema::FIND_BY_KEYS => [
            0 => 'comment',
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
    'user' => [
        \Cycle\ORM\Schema::ENTITY => 'Acme\\Entity\\User',
        \Cycle\ORM\Schema::MAPPER => 'Cycle\\ORM\\Mapper\\PromiseMapper',
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
                \Cycle\ORM\Relation::LOAD => 11,
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
];