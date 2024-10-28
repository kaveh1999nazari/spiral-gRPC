<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class AddUniqueConstraintToExistingMobileColumn extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('users')
            ->addIndex(['mobile'], [
                'name' => 'unique_mobile_index',
                'unique' => true,
            ])
            ->update();
    }

    public function down(): void
    {
        $this->table('users')
            ->dropIndex(['mobile'])
            ->update();
    }
}
