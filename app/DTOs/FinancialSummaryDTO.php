<?php 

namespace App\DTOs;

class FinancialSummaryDTO{
    public function __construct(
        public readonly float $totalBalance,
        public readonly float $thisMonthIncome,
        public readonly float $incomeChange,
        public readonly float $thisMonthExpense,
        public readonly float $expenseChange,
        public readonly float $balanceChange
    ){}

    public static function fromArray(array $data): self{
        return new self(
            $data['totalBalance'],
            $data['thisMonthIncome'],
            $data['incomeChange'],
            $data['thisMonthExpense'],
            $data['expenseChange'],
            $data['balanceChange']
        );
    }

    public function toArray(): array{
        return [
            'totalBalance' => $this->totalBalance,
            'thisMonthIncome' =>$this->thisMonthIncome,
            'incomeChange' => $this->incomeChange,
            'thisMonthExpense' => $this->thisMonthExpense,
            'expenseChange' => $this->expenseChange,
            'balanceChange' => $this->balanceChange
        ];
    }
}