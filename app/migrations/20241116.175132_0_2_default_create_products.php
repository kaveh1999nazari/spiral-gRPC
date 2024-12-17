<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305045 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('products')
            ->addColumn('id', 'primary', ['nullable' => false, 'autoIncrement' => true])
            ->addColumn('name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 150])
            ->addColumn('brand', 'string', ['nullable' => true, 'size' => 150])
            ->addColumn('description', 'text', ['nullable' => true])
            ->addColumn('image', 'json', ['nullable' => true])
            ->addColumn('in_stock', 'enum', ['values' => ['yes', 'no']])
            ->addColumn('category_id', 'integer', ['nullable' => false])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey(['category_id'], 'categories', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('products')->drop();
    }
}
