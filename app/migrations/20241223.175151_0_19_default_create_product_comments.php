<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305066 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('product_comments')
            ->addColumn('id', 'primary', ['nullable' => false, 'autoIncrement' => true])
            ->addColumn('user_id', 'integer', ['nullable' => true])
            ->addColumn('product_price_id', 'integer', ['nullable' => false])
            ->addColumn('order_item_id', 'integer', ['nullable' => true])
            ->addColumn('comment', 'text', ['nullable' => false])
            ->addColumn('is_active', 'boolean', ['nullable' => false, 'default' => false])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->setPrimaryKeys(['id'])
            ->addForeignKey(['user_id'], 'users', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['product_price_id'], 'product_prices', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['order_item_id'], 'order_items', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('product_comments')->drop();
    }
}
