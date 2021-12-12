<?php 
return array (
  'comment' => 
  array (
    1 => 'Acme\\Entity\\Comment',
    2 => 'Cycle\\ORM\\Mapper\\PromiseMapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'comments',
    7 => 
    array (
      0 => 'comment',
    ),
    8 => 
    array (
      0 => 'comment',
    ),
    9 => 
    array (
      'id' => 'id',
      'comment' => 'comment',
      'user_id' => 'user_id',
    ),
    10 => 
    array (
      'user' => 
      array (
        0 => 12,
        1 => 'user',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_id',
          32 => 'id',
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 
      array (
        0 => 'Acme\\VO\\Id',
        1 => 'typecast',
      ),
      'comment' => 
      array (
        0 => 'Acme\\VO\\Comment',
        1 => 'typecast',
      ),
      'user_id' => 
      array (
        0 => 'Acme\\VO\\Id',
        1 => 'typecast',
      ),
    ),
    14 => 
    array (
    ),
    19 => NULL,
  ),
  'user' => 
  array (
    1 => 'Acme\\Entity\\User',
    2 => 'Cycle\\ORM\\Mapper\\PromiseMapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'users',
    7 => 
    array (
      0 => 'id',
    ),
    8 => 
    array (
      0 => 'id',
    ),
    9 => 
    array (
      'id' => 'id',
      'name' => 'name',
    ),
    10 => 
    array (
      'comments' => 
      array (
        0 => 11,
        1 => 'comment',
        3 => 11,
        2 => 
        array (
          30 => true,
          31 => false,
          41 => 
          array (
          ),
          42 => 
          array (
          ),
          33 => 
          array (
            0 => 'id',
          ),
          32 => 
          array (
            0 => 'user_id',
          ),
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 
      array (
        0 => 'Acme\\VO\\Id',
        1 => 'typecast',
      ),
      'name' => 
      array (
        0 => 'Acme\\VO\\Name',
        1 => 'typecast',
      ),
    ),
    14 => 
    array (
    ),
    19 => NULL,
  ),
);