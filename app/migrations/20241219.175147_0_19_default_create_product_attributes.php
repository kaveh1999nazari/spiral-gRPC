<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305061 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('product_attributes')
            ->addColumn('id', 'primary', ['nullable' => false, 'autoIncrement' => true])
            ->addColumn('product_id', 'integer', ['nullable' => false])
            ->addColumn('attribute_id', 'integer', ['nullable' => false])
            ->addColumn('attribute_value_id', 'integer', ['nullable' => false])
            ->addForeignKey(['product_id'], 'products', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['attribute_id'], 'attributes', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['attribute_value_id'], 'attribute_values', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('product_attributes')->drop();
    }
}
