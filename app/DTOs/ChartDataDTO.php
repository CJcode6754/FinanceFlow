<?php

namespace App\DTOs;

class ChartDataDTO
{
    public function __construct(
        public readonly array $graphIncome,
        public readonly array $graphExpense,
        public readonly array $monthLabels,
        public readonly array $categoryLabels,
        public readonly array $categoryData
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['graphIncome'],
            $data['graphExpense'],
            $data['monthLabels'],
            $data['categoryLabels'],
            $data['categoryData']
        );
    }

    public function toArray(): array
    {
        return [
            'graphIncome' => $this->graphIncome,
            'graphExpense' => $this->graphExpense,
            'monthLabels' => $this->monthLabels,
            'spcategoryLabels' => $this->categoryLabels,
            'spCategory' => $this->categoryData,
        ];
    }
}