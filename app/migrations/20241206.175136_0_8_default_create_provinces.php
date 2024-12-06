<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305051 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('provinces')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11, 'autoIncrement' => true,])
            ->addColumn('name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('provinces')->drop();
    }
}
