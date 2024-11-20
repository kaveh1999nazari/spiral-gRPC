<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305049 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('productprices')
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
            ->addColumn('options', 'json', ['nullable' => false])
            ->addColumn('price', 'string', ['nullable' => false, 'size' => 255])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('productprices')->drop();
    }
}
