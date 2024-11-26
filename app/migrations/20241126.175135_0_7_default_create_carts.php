<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305050 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('carts')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'autoIncrement' => true,
                'unsigned' => false,
                'zerofill' => false,
            ])
            ->addColumn('user_id', 'integer', ['nullable' => true])
            ->addForeignKey(['user_id'], 'users', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addColumn('uuid', 'string', ['nullable' => true])
            ->addColumn('price', 'string', ['nullable' => false, 'size' => 255])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('carts')->drop();
    }
}

