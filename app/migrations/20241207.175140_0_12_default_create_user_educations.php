<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305055 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('user_educations')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11])
            ->addColumn('user_id', 'integer')
            ->addColumn('university', 'string', ['nullable' => true, 'size' => 200])
            ->addColumn('degree_id', 'integer', ['nullable' => false, 'size' => 100])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey(['user_id'], 'users', ['id'], ['onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->addForeignKey(['degree_id'], 'degrees', ['id'], ['onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('user_educations')->drop();
    }
}
