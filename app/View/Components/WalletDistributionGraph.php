<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WalletDistributionGraph extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public  array $walletLabels,
        public array $walletData
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.wallet-distribution-graph');
    }
}
