<?php

namespace App\DTOs;

class BudgetSummaryDTO
{
    public function __construct(
        public readonly float $totalSpent,
        public readonly float $totalBudget,
        public readonly float $totalRemaining,
        public readonly float $budgetPercentage
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['totalSpent'],
            $data['totalBudget'],
            $data['totalRemaining'],
            $data['budgetPercentage']
        );
    }

    public function toArray(): array
    {
        return [
            'totalSpent' => $this->totalSpent,
            'totalBudget' => $this->totalBudget,
            'totalRemaining' => $this->totalRemaining,
            'budgetPercentage' => $this->budgetPercentage,
        ];
    }
}
