<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305056 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('medias')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11])
            ->addColumn('Entity_type', 'string', ['size' => 100])
            ->addColumn('Entity_id', 'integer')
            ->addColumn('name', 'string', ['size' => 100])
            ->addColumn('pass', 'string', ['size' => 200])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('medias')->drop();
    }
}
