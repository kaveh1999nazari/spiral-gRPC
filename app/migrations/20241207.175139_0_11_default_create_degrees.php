<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305054 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('degrees')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11])
            ->addColumn('name', 'string', ['nullable' => false, 'size' => 200])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('degrees')->drop();
    }
}
