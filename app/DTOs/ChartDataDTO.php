<?php

namespace App\DTOs;

class ChartDataDTO
{
    public function __construct(
        public readonly array $graphIncome,
        public readonly array $graphExpense,
        public readonly array $monthLabels,
        public readonly array $categoryLabels,
        public readonly array $categoryData,
        public readonly array $walletLabels,
        public readonly array $walletData,
        // public readonly array $budgetLabels,
        // public readonly array $budgetData
    ) {}

    public static function fromArray(array $data)
    {
        return new self(
            $data['graphIncome'],
            $data['graphExpense'],
            $data['monthLabels'],
            $data['categoryLabels'],
            $data['categoryData'],
            $data['walletLabels'],
            $data['walletData'],
            // $data['budgetLabels'],
            // $data['budgetData']
        );
    }

    public function toArray()
    {
        return [
            'graphIncome' => $this->graphIncome,
            'graphExpense' => $this->graphExpense,
            'monthLabels' => $this->monthLabels,
            'categoryLabels' => $this->categoryLabels,
            'categoryData' => $this->categoryData,
            'walletLabels' => $this->walletLabels,
            'walletData' => $this->walletData,
            // 'budgetLabels' => $this->budgetLabels,
            // 'budgetData' => $this->budgetData
        ];
    }
}
