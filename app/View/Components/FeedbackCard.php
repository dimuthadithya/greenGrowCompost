<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeedbackCard extends Component
{
    public function __construct(
        public string $name,
        public string $content,
        public string $avatar,
        public int $rating,
        public ?string $date = null
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.feedback-card');
    }
}
