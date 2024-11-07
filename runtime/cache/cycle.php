<?php return array (
  'category' => 
  array (
    1 => 'App\\Entity\\Category',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Repository\\CategoryRepository',
    5 => 'default',
    6 => 'categories',
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
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'user' => 
  array (
    1 => 'App\\Entity\\User',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Repository\\UserRepository',
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
      'mobile' => 'mobile',
      'password' => 'password',
      'rule' => 'rule',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
  'token' => 
  array (
    1 => 'Spiral\\Cycle\\Auth\\Token',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'auth_tokens',
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
      'hashedValue' => 'hashed_value',
      'createdAt' => 'created_at',
      'expiresAt' => 'expires_at',
      'payload' => 'payload',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'createdAt' => 'datetime',
      'expiresAt' => 'datetime',
    ),
    14 => 
    array (
    ),
    19 => NULL,
    20 => 
    array (
      'id' => 2,
    ),
  ),
);