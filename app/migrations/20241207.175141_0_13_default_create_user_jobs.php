<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultUserJobsMigration extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('user_jobs')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11])
            ->addColumn('user_id', 'integer', ['unique' => true, 'nullable' => false])
            ->addColumn('province_id', 'integer', ['nullable' => false])
            ->addColumn('city_id', 'integer', ['nullable' => false])
            ->addColumn('title', 'string', ['nullable' => false, 'size' => 200])
            ->addColumn('phone', 'string', ['nullable' => true, 'size' => 15])
            ->addColumn('postal_code', 'string', ['nullable' => true, 'size' => 10])
            ->addColumn('address', 'text', ['nullable' => true])
            ->addColumn('monthly_salary', 'float', ['nullable' => true, 'default' => 0])
            ->addColumn('work_experience_duration', 'integer', ['nullable' => true])
            ->addColumn('work_type', 'enum', [
                'nullable' => false,
                'values' => ['government', 'private', 'freelancer', 'student', 'other']
            ])
            ->addColumn('contract_type', 'enum', [
                'nullable' => false,
                'values' => ['owner', 'project', 'part_time', 'full_time', 'other']
            ])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey(['user_id'], 'users', ['id'], ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE'])
            ->addForeignKey(['province_id'], 'provinces', ['id'], ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE'])
            ->addForeignKey(['city_id'], 'cities', ['id'], ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE'])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('user_jobs')->drop();
    }
}
