<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305060 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('attribute_values')
            ->addColumn('id', 'primary', ['nullable' => false, 'autoIncrement' => true])
            ->addColumn('name', 'string', ['nullable' => false, 'size' => 255])
            ->addColumn('attribute_id', 'integer', ['nullable' => false])
            ->addForeignKey(['attribute_id'], 'attributes', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('attribute_values')->drop();
    }
}
