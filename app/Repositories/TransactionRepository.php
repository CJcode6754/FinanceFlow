<?php
namespace App\Repositories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository{
    public function baseQuery(int $userId): Builder {
        return Transaction::with('category', 'wallet')->where('user_id', $userId);
    }

    public function getMonthlyAmount(int $userId, int $month, int $year, string $type){
        return $this->baseQuery($userId)
            ->byMonth($month, $year)
            ->byType($type)
            ->sum('amount');
    }

    public function getRecentTransactions(int $userId, int $limit = 5): Collection{
        return $this->baseQuery($userId)->recent($limit)->get();
    }

    public function getMonthlyData(int $userId, int $months): array{
        $graphIncome = [];
        $graphExpense = [];
        $monthLabels = [];

        for ($i = $months; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $month = $date->month;
            $year = $date->year;

            $graphIncome[] = $this->getMonthlyAmount($userId, $month, $year, 'income');
            $graphExpense[] = $this->getMonthlyAmount($userId, $month, $year, 'expense');

            $monthLabels[] = $date->format('M Y');
        }

        return compact('graphIncome', 'graphExpense', 'monthLabels');
    }
}