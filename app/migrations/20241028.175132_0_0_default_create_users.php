<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305043 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('users')
            ->addColumn('id', 'primary', ['nullable' => false, 'size' => 11, 'autoIncrement' => true,])
            ->addColumn('first_name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 100])
            ->addColumn('last_name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 100])
            ->addColumn('mobile', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 12])
            ->addColumn('email', 'string', ['nullable' => true, 'defaultValue' => null, 'size' => 100])
            ->addColumn('father_name', 'string', ['nullable' => true, 'defaultValue' => null, 'size' => 100])
            ->addColumn('national_code', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 12])
            ->addColumn('birth_date', 'date', ['nullable' => true, 'defaultValue' => null, 'size' => 10])
            ->addColumn('password', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 100])
            ->addColumn('otp_code', 'string',['nullable' => true , 'size' => 10])
            ->addColumn('otp_expired_at', 'datetime',['nullable' => true])
            ->addColumn('roles', 'json')
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->setPrimaryKeys(['id'])
            ->addIndex(['mobile', 'email'], [
                'unique' => true,
            ])
            ->addIndex(['national_code'], [
                'unique' => true,
            ])

            ->create();
    }

    public function down(): void
    {
        $this->table('users')->drop();
    }
}
