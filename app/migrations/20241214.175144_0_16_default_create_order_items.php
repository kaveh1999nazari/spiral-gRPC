<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305058 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('order_items')
            ->addColumn('id', 'primary', ['autoIncrement' => true])
            ->addColumn('user_id', 'integer')
            ->addColumn('order_id', 'integer')
            ->addColumn('product_price_id', 'integer')
            ->addColumn('number', 'integer')
            ->addColumn('price', 'string')
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey(['user_id'], 'users', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['order_id'], 'orders', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('order_items')->drop();
    }
}
