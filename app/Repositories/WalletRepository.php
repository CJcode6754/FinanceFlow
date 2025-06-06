<?php 
namespace App\Repositories;

use App\Models\Wallet;

class WalletRepository{
    public function baseQuery(int $userId){
        return Wallet::with('transaction')->where('user_id', $userId);
    }

    public function getTotalBalance(int $userId){
        return $this->baseQuery($userId)->sum('balance');
    }

    public function getMonthlyBalance(int $userId, int $month, int $year){
        return $this->baseQuery($userId)
            ->whereMonth('updated_at', $month)
            ->whereYear('updated_at', $year)
            ->sum('balance');
    }

    public function getAllWallets(int $userId){
        return $this->BaseQuery($userId)
            ->select('name', 'balance')
            ->get();
    }
}