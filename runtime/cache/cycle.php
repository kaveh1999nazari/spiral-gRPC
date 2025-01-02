<?php return array (
  'userEducation' => 
  array (
    1 => 'App\\Domain\\Entity\\UserEducation',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserEducationRepository',
    5 => 'default',
    6 => 'user_educations',
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
      'university' => 'university',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'degree_id' => 'degree_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'degree' => 
      array (
        0 => 12,
        1 => 'degree',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'degree_id',
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
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'degree_id' => 'int',
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
  'order' => 
  array (
    1 => 'App\\Domain\\Entity\\Order',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\OrderRepository',
    5 => 'default',
    6 => 'orders',
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
      'totalPrice' => 'total_price',
      'status' => 'status',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'user_resident_id' => 'user_resident_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'user_resident' => 
      array (
        0 => 12,
        1 => 'userResident',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'user_resident_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'orderItem' => 
      array (
        0 => 11,
        1 => 'orderItem',
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
          32 => 'order_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'user_resident_id' => 'int',
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
  'userJob' => 
  array (
    1 => 'App\\Domain\\Entity\\UserJob',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserJobRepository',
    5 => 'default',
    6 => 'user_jobs',
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
      'title' => 'title',
      'phone' => 'phone',
      'postalCode' => 'postal_code',
      'address' => 'address',
      'monthlySalary' => 'monthly_salary',
      'workExperienceDuration' => 'work_experience_duration',
      'workType' => 'work_type',
      'contractType' => 'contract_type',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'province_id' => 'province_id',
      'city_id' => 'city_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'province' => 
      array (
        0 => 12,
        1 => 'province',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'province_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'city' => 
      array (
        0 => 12,
        1 => 'city',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'city_id',
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
      'monthlySalary' => 'float',
      'workExperienceDuration' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'province_id' => 'int',
      'city_id' => 'int',
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
  'userResident' => 
  array (
    1 => 'App\\Domain\\Entity\\UserResident',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\UserResidentRepository',
    5 => 'default',
    6 => 'user_residents',
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
      'address' => 'address',
      'postalCode' => 'postal_code',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'province_id' => 'province_id',
      'city_id' => 'city_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'province' => 
      array (
        0 => 12,
        1 => 'province',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'province_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'city' => 
      array (
        0 => 12,
        1 => 'city',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'city_id',
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
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
      'province_id' => 'int',
      'city_id' => 'int',
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
  'notificationChannel' => 
  array (
    1 => 'App\\Domain\\Entity\\NotificationChannel',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'notification_channels',
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
      'slug' => 'slug',
      'name' => 'name',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
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
  'commentProduct' => 
  array (
    1 => 'App\\Domain\\Entity\\CommentProduct',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\CommentProductRepository',
    5 => 'default',
    6 => 'product_comments',
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
      'comment' => 'comment',
      'isActive' => 'is_active',
      'createdAt' => 'created_at',
      'user_id' => 'user_id',
      'product_price_id' => 'product_price_id',
      'order_id' => 'order_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'product_price' => 
      array (
        0 => 12,
        1 => 'productPrice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'product_price_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'order' => 
      array (
        0 => 12,
        1 => 'order',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => true,
          33 => 'order_id',
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
      'isActive' => 'bool',
      'createdAt' => 'datetime',
      'user_id' => 'int',
      'product_price_id' => 'int',
      'order_id' => 'int',
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
  'degree' => 
  array (
    1 => 'App\\Domain\\Entity\\Degree',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'degrees',
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
  'productPrice' => 
  array (
    1 => 'App\\Domain\\Entity\\ProductPrice',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\ProductPriceRepository',
    5 => 'default',
    6 => 'product_prices',
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
      'discountPercentage' => 'discount_percentage',
      'discountEndAt' => 'discount_end_at',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
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
      'price' => 'float',
      'discountPercentage' => 'float',
      'discountEndAt' => 'datetime',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
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
  'attribute' => 
  array (
    1 => 'App\\Domain\\Entity\\Attribute',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'attributes',
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
  'productAttribute' => 
  array (
    1 => 'App\\Domain\\Entity\\ProductAttribute',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\ProductAttributeRepository',
    5 => 'default',
    6 => 'product_attributes',
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
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'product_id' => 'product_id',
      'attribute_id' => 'attribute_id',
      'attribute_value_id' => 'attribute_value_id',
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
      'attribute' => 
      array (
        0 => 12,
        1 => 'attribute',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'attribute_id',
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'attribute_value' => 
      array (
        0 => 12,
        1 => 'attributeValue',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'attribute_value_id',
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
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'product_id' => 'int',
      'attribute_id' => 'int',
      'attribute_value_id' => 'int',
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
  'province' => 
  array (
    1 => 'App\\Domain\\Entity\\Province',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'provinces',
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
  'productFavorite' => 
  array (
    1 => 'App\\Domain\\Entity\\ProductFavorite',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\ProductFavoriteRepository',
    5 => 'default',
    6 => 'product_favorites',
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
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'user_id' => 'user_id',
      'product_id' => 'product_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
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
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'user_id' => 'int',
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
  'city' => 
  array (
    1 => 'App\\Domain\\Entity\\City',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'cities',
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
      'province_id' => 'province_id',
    ),
    10 => 
    array (
      'province' => 
      array (
        0 => 12,
        1 => 'province',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'province_id',
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
      'province_id' => 'int',
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
  'orderItem' => 
  array (
    1 => 'App\\Domain\\Entity\\OrderItem',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\OrderItemRepository',
    5 => 'default',
    6 => 'order_items',
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
      'productPriceId' => 'product_price_id',
      'number' => 'number',
      'price' => 'price',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
      'order_id' => 'order_id',
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
          32 => 
          array (
            0 => 'id',
          ),
        ),
      ),
      'order' => 
      array (
        0 => 12,
        1 => 'order',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'order_id',
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
      'productPriceId' => 'int',
      'number' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
      'order_id' => 'int',
      'user_id' => 'int',
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
      'firstName' => 'first_name',
      'lastName' => 'last_name',
      'email' => 'email',
      'mobile' => 'mobile',
      'password' => 'password',
      'fatherName' => 'father_name',
      'nationalCode' => 'national_code',
      'birthDate' => 'birth_date',
      'roles' => 'roles',
      'created_at' => 'created_at',
      'updated_at' => 'updated_at',
      'otpCode' => 'otp_code',
      'otpExpiredAt' => 'otp_expired_at',
    ),
    10 => 
    array (
      'userResident' => 
      array (
        0 => 11,
        1 => 'userResident',
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
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'cart' => 
      array (
        0 => 11,
        1 => 'cart',
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
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'order' => 
      array (
        0 => 11,
        1 => 'order',
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
          32 => 'user_id',
          4 => NULL,
        ),
      ),
      'orderItem' => 
      array (
        0 => 11,
        1 => 'orderItem',
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
          32 => 'user_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'birthDate' => 'datetime',
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
      'otpExpiredAt' => 'datetime',
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
  'notificationType' => 
  array (
    1 => 'App\\Domain\\Entity\\NotificationType',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'notification_types',
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
      'slug' => 'slug',
      'name' => 'name',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
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
      'product_price_id' => 'product_price_id',
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
      'product_price' => 
      array (
        0 => 12,
        1 => 'productPrice',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'product_price_id',
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
      'totalPrice' => 'float',
      'user_id' => 'int',
      'product_price_id' => 'int',
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
  'media' => 
  array (
    1 => 'App\\Domain\\Entity\\Media',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'App\\Domain\\Repository\\MediaRepository',
    5 => 'default',
    6 => 'medias',
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
      'entityType' => 'entity_type',
      'entityId' => 'entity_id',
      'name' => 'name',
      'pass' => 'pass',
      'createdAt' => 'created_at',
    ),
    10 => 
    array (
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'entityId' => 'int',
      'createdAt' => 'datetime',
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
      'brand' => 'brand',
      'description' => 'description',
      'image' => 'image',
      'inStock' => 'in_stock',
      'createdAt' => 'created_at',
      'updatedAt' => 'updated_at',
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
      'productPrice' => 
      array (
        0 => 11,
        1 => 'productPrice',
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
          32 => 'product_id',
          4 => NULL,
        ),
      ),
      'productAttribute' => 
      array (
        0 => 11,
        1 => 'productAttribute',
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
          32 => 'product_id',
          4 => NULL,
        ),
      ),
    ),
    12 => NULL,
    13 => 
    array (
      'id' => 'int',
      'createdAt' => 'datetime',
      'updatedAt' => 'datetime',
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
  'attributeValue' => 
  array (
    1 => 'App\\Domain\\Entity\\AttributeValue',
    2 => 'Cycle\\ORM\\Mapper\\Mapper',
    3 => 'Cycle\\ORM\\Select\\Source',
    4 => 'Cycle\\ORM\\Select\\Repository',
    5 => 'default',
    6 => 'attribute_values',
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
      'attribute_id' => 'attribute_id',
    ),
    10 => 
    array (
      'attribute' => 
      array (
        0 => 12,
        1 => 'attribute',
        3 => 10,
        2 => 
        array (
          30 => true,
          31 => false,
          33 => 'attribute_id',
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
      'attribute_id' => 'int',
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