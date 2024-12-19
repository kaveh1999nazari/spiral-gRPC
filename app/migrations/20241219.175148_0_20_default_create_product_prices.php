<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305062 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('product_prices')
            ->addColumn('id', 'primary', ['nullable' => false, 'autoIncrement' => true])
            ->addColumn('product_id', 'integer', ['nullable' => false])
            ->addColumn('options', 'json', ['nullable' => false])
            ->addColumn('price', 'float', ['nullable' => false])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->setPrimaryKeys(['id'])
            ->addForeignKey(['product_id'], 'products', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('product_prices')->drop();
    }
}
