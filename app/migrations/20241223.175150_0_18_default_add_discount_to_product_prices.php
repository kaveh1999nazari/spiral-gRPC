<?php
declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefaultA42b7e366d78543ca8c5a4b60d305065 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('product_prices')
            ->addColumn('discount_percentage', 'float', ['nullable' => true])
            ->addColumn('discount_end_at', 'datetime', ['nullable' => true])
            ->update();
    }

    public function down(): void
    {
        $this->table('product_prices')
            ->dropColumn('discount_percentage')
            ->dropColumn('discount_end_at')
            ->update();
    }
}
