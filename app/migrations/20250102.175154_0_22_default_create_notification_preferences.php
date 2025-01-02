<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305069 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('notification_preferences')
            ->addColumn('id', 'primary', ['nullable' => false, 'autoIncrement' => true])
            ->addColumn('user_id', 'integer')
            ->addColumn('notification_type_id', 'integer')
            ->addColumn('notification_channel_id', 'integer')
            ->addColumn('is_enabled', 'bool')
            ->addColumn('is_user_modifiable', 'bool')
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('notification_preferences')->drop();
    }
}
