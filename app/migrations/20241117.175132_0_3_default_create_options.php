<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305046 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('options')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'autoIncrement' => true,
                'unsigned' => false,
                'zerofill' => false,
            ])
            ->addColumn('name', 'string', ['nullable' => false, 'size' => 255])
            ->setPrimaryKeys(['id'])
            ->addIndex(['name'], [
                'unique' => true,
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('options')->drop();
    }
}
