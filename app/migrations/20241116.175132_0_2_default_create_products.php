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
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'autoIncrement' => true,
                'unsigned' => false,
                'zerofill' => false,
            ])
            ->addColumn('name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->addColumn('description', 'string', ['nullable' => true, 'size' => 500])
            ->addColumn('image', 'json', ['nullable' => true])
            ->addColumn('category_id', 'integer', ['nullable' => false])
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
