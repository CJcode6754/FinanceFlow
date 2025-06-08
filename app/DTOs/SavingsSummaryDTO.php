<?php

namespace App\DTOs;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class SavingsSummaryDTO
{
    public function __construct(
        public readonly float $totalSaved,
        public readonly float $totalGoals,
        public readonly int $activeGoals,
        public readonly float $avgProgress,
        public readonly LengthAwarePaginator $transactionHistory,
        public readonly Collection $savings
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['totalSaved'],
            $data['totalGoals'],
            $data['activeGoals'],
            $data['avgProgress'],
            $data['transactionHistory'],
            $data['savings']
        );
    }

    public function toArray(): array
    {
        return [
            'totalSaved' => $this->totalSaved,
            'totalGoals' => $this->totalGoals,
            'activeGoals' => $this->activeGoals,
            'avgProgress' => $this->avgProgress,
            'transactionHistory' => $this->transactionHistory,
            'savings' => $this->savings,
        ];
    }
}