<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Models\Wallet;

class WalletRepository
{
    public function baseQuery(int $userId)
    {
        return Wallet::with('transaction')->where('user_id', $userId);
    }

    public function getTotalBalance(int $userId)
    {
        return $this->baseQuery($userId)->sum('balance');
    }

    public function getMonthlyBalance(int $userId, int $month, int $year)
    {
        return $this->baseQuery($userId)
            ->whereMonth('updated_at', $month)
            ->whereYear('updated_at', $year)
            ->sum('balance');
    }

    public function getAllWallets(int $userId)
    {
        return $this->BaseQuery($userId)
            ->select('name', 'balance')
            ->get();
    }

    public function getWalletDistribution(int $userId)
    {
        $transactions = Transaction::with('category', 'wallet')
            ->whereHas('wallet', fn($q) => $q->where('user_id', $userId))
            ->where('type', 'expense')
            ->get();

        $grouped = $transactions->groupBy(fn($transac) => $transac->category->name ?? 'Uncategorized');

        $walletLabels = [];
        $walletData = [];

        foreach ($grouped as $category_name => $data) {
            $walletLabels[] = $category_name;
            $walletData[] = $data->sum('amount');
        }

        return [
            'walletLabels' => $walletLabels,
            'walletData' => $walletData,
        ];
    }
}
