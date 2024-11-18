<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305047 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('optionvalues')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'autoIncrement' => true,
                'unsigned' => false,
                'zerofill' => false,
            ])
            ->addColumn('name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->addColumn('option_id', 'integer', ['nullable' => false])
            ->addForeignKey(['option_id'], 'options', ['id'], [
                'onDelete' => 'CASCADE',
                'onUpdate' => 'CASCADE'
            ])
            ->setPrimaryKeys(['id'])
            ->addIndex(['name'], [
                'unique' => true,
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('optionvalues')->drop();
    }
}
