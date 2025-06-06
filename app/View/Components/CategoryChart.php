<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryChart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $categoryLabels,
        public array $categoryData
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-chart');
    }
}
