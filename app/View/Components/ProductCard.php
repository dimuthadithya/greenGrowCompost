<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public function __construct(
        public string $title,
        public string $price,
        public string $image,
        public string $description,
        public int $productId
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
