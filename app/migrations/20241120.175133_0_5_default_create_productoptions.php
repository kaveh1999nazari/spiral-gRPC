<?php

declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305048 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('productoptions')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'autoIncrement' => true,
                'unsigned' => false,
                'zerofill' => false,
            ])
            ->addColumn('product_id', 'integer', ['nullable' => false])
            ->addForeignKey(['product_id'], 'products', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addColumn('option_id', 'integer', ['nullable' => false])
            ->addForeignKey(['option_id'], 'options', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addColumn('option_value_id', 'integer', ['nullable' => false])
            ->addForeignKey(['option_value_id'], 'optionvalues', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('productoptions')->drop();
    }
}

