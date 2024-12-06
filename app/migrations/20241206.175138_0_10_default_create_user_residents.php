<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305053 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('user_residents')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11])
            ->addColumn('user_id', 'integer')
            ->addColumn('address', 'string', ['nullable' => false, 'size' => 200])
            ->addColumn('postal_code', 'string', ['nullable' => false, 'size' => 10])
            ->addColumn('province_id', 'integer')
            ->addColumn('city_id', 'integer')
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey(['user_id'], 'users', ['id'], ['onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['province_id'], 'provinces', ['id'], ['onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['city_id'], 'cities', ['id'], ['onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('user_residents')->drop();
    }
}
