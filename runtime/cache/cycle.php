<?php return array (
  'productOption' => 
  array (
    1 => 'App\\Domain\\Entity\\ProductOption',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'productoptions',
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
      'product_id' => 'product_id',
      'option_id' => 'option_id',
      'optionValue_id' => 'optionValue_id',
    ),
    10 => 
    array (
      'product' => 
      array (
        0 => 12,
        1 => 'product',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'product_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'option' => 
      array (
        0 => 12,
        1 => 'option',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'option_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'optionValue' => 
      array (
        0 => 12,
        1 => 'optionValue',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'optionValue_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'product_id' => 'int',
      'option_id' => 'int',
      'optionValue_id' => 'int',
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
  'productPrice' => 
  array (
    1 => 'App\\Domain\\Entity\\ProductPrice',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\ProductPriceRepository',
    5 => 'default',
    6 => 'productprices',
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
      'options' => 'options',
      'price' => 'price',
      'product_id' => 'product_id',
    ),
    10 => 
    array (
      'product' => 
      array (
        0 => 12,
        1 => 'product',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'product_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'product_id' => 'int',
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
  'optionValue' => 
  array (
    1 => 'App\\Domain\\Entity\\OptionValue',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'optionvalues',
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
      'option_id' => 'option_id',
    ),
    10 => 
    array (
      'option' => 
      array (
        0 => 12,
        1 => 'option',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'option_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'option_id' => 'int',
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
  'category' => 
  array (
    1 => 'App\\Domain\\Entity\\Category',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\CategoryRepository',
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
      'products' => 
      array (
        0 => 11,
        1 => 'product',
        3 => 10,
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
          32 => 'category_id',
          4 => NULL,
        ),
      ),
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
    1 => 'App\\Domain\\Entity\\User',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserRepository',
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
      'roles' => 'roles',
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
  'cart' => 
  array (
    1 => 'App\\Domain\\Entity\\Cart',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\CartRepository',
    5 => 'default',
    6 => 'carts',
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
      'uuid' => 'uuid',
      'number' => 'number',
      'totalPrice' => 'total_price',
      'user_id' => 'user_id',
      'productPrice_id' => 'productPrice_id',
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
          31 => true,
          33 => 'user_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'productPrice' => 
      array (
        0 => 12,
        1 => 'productPrice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'productPrice_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'number' => 'int',
      'user_id' => 'int',
      'productPrice_id' => 'int',
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
  'product' => 
  array (
    1 => 'App\\Domain\\Entity\\Product',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\ProductRepository',
    5 => 'default',
    6 => 'products',
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
      'description' => 'description',
      'image' => 'image',
      'category_id' => 'category_id',
    ),
    10 => 
    array (
      'category' => 
      array (
        0 => 12,
        1 => 'category',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'category_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'category_id' => 'int',
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
  'option' => 
  array (
    1 => 'App\\Domain\\Entity\\Option',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'options',
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