<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'subtotal',
        'tax',
        'shipping',
        'total',
        'order_number'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'shipping' => 'decimal:2',
        'total' => 'decimal:2'
    ];

    public static function generateUniqueOrderNumber()
    {
        return DB::transaction(function () {
            // Lock the sequence record for update
            $sequence = DB::table('order_sequences')
                ->lockForUpdate()
                ->first();

            if (!$sequence) {
                throw new \RuntimeException('Order sequence not initialized');
            }

            // Get and increment the next value
            $nextValue = $sequence->next_value;

            DB::table('order_sequences')
                ->where('id', $sequence->id)
                ->update([
                    'next_value' => $nextValue + 1,
                    'updated_at' => now()
                ]);

            // Format and return the order number
            return 'GGC' . str_pad($nextValue, 8, '0', STR_PAD_LEFT);
        });
    }

    // Boot has been removed as it's not needed anymore since we're handling order numbers explicitly

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the shipping address for the order.
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the items for the order.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the items summary for display.
     */
    public function getItemsSummaryAttribute(): string
    {
        // Access the already loaded relationship instead of making a new query
        $items = $this->items()->with('product')->get();

        if ($items->isEmpty()) {
            return 'No items';
        }

        return $items->map(function ($item) {
            if (!$item) {
                return null;
            }

            $productName = 'Product Removed';
            $quantity = $item->quantity ?? 0;
            $price = $item->price ?? 0;

            if ($item->product) {
                $productName = $item->product->name;
            }

            return "{$productName} (x{$quantity} @ $" . number_format($price, 2) . ")";
        })
            ->filter()
            ->implode(', ');
    }

    /**
     * Get the total amount for the order.
     */
    public function getTotalAmountAttribute()
    {
        if ($this->total) {
            return $this->total;
        }

        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity * $item->unit_price;
        }
        return $total;
    }

    /**
     * Get the status color for display.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'warning',
            'processing' => 'info',
            'shipped' => 'primary',
            'delivered' => 'success',
            'cancelled' => 'danger',
            default => 'secondary',
        };
    }

    public static function createOrder(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            // Generate the order number first
            $sequence = DB::table('order_sequences')->insertGetId([
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $attributes['order_number'] = 'GGC' . str_pad($sequence, 8, '0', STR_PAD_LEFT);

            // Create the order with the generated number
            return static::create($attributes);
        });
    }
}
