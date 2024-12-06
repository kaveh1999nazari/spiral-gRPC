<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305052 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('cities')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11, 'autoIncrement' => true,])
            ->addColumn('province_id', 'integer')
            ->addColumn('name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->addForeignKey(['province_id'], 'provinces', ['id'], ['onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('cities')->drop();
    }
}
