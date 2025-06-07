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
        public readonly array $budgetName,
        public readonly array $setBudget,
        public readonly array $actualBudget
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
            $data['budgetName'],
            $data['setBudget'],
            $data['actualBudget']
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
            'budgetName' => $this->budgetName,
            'setBudget' => $this->setBudget,
            'actualBudget' => $this->actualBudget
        ];
    }
}
