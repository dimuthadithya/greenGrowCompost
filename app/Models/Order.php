<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'total'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'shipping' => 'decimal:2',
        'total' => 'decimal:2'
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
