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
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'defaultValue' => null,
                'size' => 11,
                'autoIncrement' => true,
                'unsigned' => false,
                'zerofill' => false,
            ])
            ->addColumn('mobile', 'string', ['nullable' => false, 'defaultValue' => null, 'unique' => true, 'size' => 255])
            ->addColumn('password', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('users')->drop();
    }
}
