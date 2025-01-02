<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305070 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('notifications')
            ->addColumn('id', 'uuid', ['nullable' => false])
            ->addColumn('type', 'string')
            ->addColumn('notifiable_type', 'string')
            ->addColumn('notifiable_id', 'integer')
            ->addColumn('data', 'text')
            ->addColumn('read_at', 'datetime', ['nullable' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('notifications')->drop();
    }
}
