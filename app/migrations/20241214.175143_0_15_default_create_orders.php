<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305057 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('orders')
            ->addColumn('id', 'primary', ['autoIncrement' => true])
            ->addColumn('user_id', 'integer', ['nullable' => false])
            ->addColumn('total_price', 'string', ['nullable' => true, 'size' => 255])
            ->addColumn('status', 'enum', ['nullable' => true,
                'values' =>['pending', 'place_order', 'accepted_order', 'send_product', 'received_product', 'canceled']])
            ->addColumn('user_resident_id', 'integer')
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey(['user_id'], 'users', ['id'])
            ->addForeignKey(['user_resident_id'], 'user_residents', ['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('orders')->drop();
    }
}
