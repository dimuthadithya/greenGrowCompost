<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove old columns
            $table->dropColumn([
                'order_number',
                'total_amount',
                'shipping_address',
                'shipping_city',
                'shipping_state',
                'shipping_postal_code',
                'shipping_phone',
                'notes',
                'shipped_at',
                'delivered_at'
            ]);

            // Add new columns
            $table->foreignId('address_id')->after('user_id')->constrained();
            $table->decimal('subtotal', 10, 2)->after('address_id');
            $table->decimal('tax', 10, 2)->after('subtotal');
            $table->decimal('shipping', 10, 2)->after('tax');
            $table->decimal('total', 10, 2)->after('shipping');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Remove new columns
            $table->dropForeign(['address_id']);
            $table->dropColumn(['address_id', 'subtotal', 'tax', 'shipping', 'total']);

            // Restore old columns
            $table->string('order_number')->unique()->after('id');
            $table->decimal('total_amount', 10, 2)->after('user_id');
            $table->string('shipping_address')->after('status');
            $table->string('shipping_city')->after('shipping_address');
            $table->string('shipping_state')->after('shipping_city');
            $table->string('shipping_postal_code')->after('shipping_state');
            $table->string('shipping_phone')->after('shipping_postal_code');
            $table->text('notes')->nullable()->after('shipping_phone');
            $table->timestamp('shipped_at')->nullable()->after('notes');
            $table->timestamp('delivered_at')->nullable()->after('shipped_at');
        });
    }
};
