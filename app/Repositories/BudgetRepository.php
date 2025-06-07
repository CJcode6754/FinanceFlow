<?php
namespace App\Repositories;

use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class BudgetRepository{
    public function getCurrentMonthBudgets(int $userId, int $limit = 3): Collection{
        $today = Carbon::today();

        return Budget::with('category')
            ->where('user_id', $userId)
            ->whereYear('start_date', $today->year)
            ->whereMonth('start_date', $today->month)
            ->limit($limit)
            ->get();
    }

    public function calculateBudgetSpending(Budget $budget, int $userId): float
    {
        return $budget->category->transactions()
            ->whereBetween('date', [$budget->start_date, $budget->end_date])
            ->where('user_id', $userId)
            ->sum('amount');
    }

    public function getBudgetVsActual(int $userId){
        $budgets = Budget::with('category')
            ->where('user_id', $userId)
            ->get();

        $budgetName = [];
        $setBudget = [];
        $actualBudget = [];

        foreach($budgets as $budget){
            $budgetName[] = $budget->category?->name ?? 'Uncategorized';
            $setBudget[] = $budget->amount;


            $actual = $budget->category?->transactions()
                ->whereBetween('date', [$budget->start_date, $budget->end_date])
                ->where('user_id', $userId)
                ->where('type', 'expense')
                ->sum('amount');

            $actualBudget[] = $actual;
        }

        return [
            'budgetName' => $budgetName,
            'setBudget' => $setBudget,
            'actualBudget' => $actualBudget
        ];
    }
}