<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository{
    public function getAllWithTransactions(int $userId){
        return Category::with('transactions')
            ->where('user_id', $userId)
            ->get();
    }


    public function getCategoryBySpending(int $userId){
        $categories = $this->getAllWithTransactions($userId);

        return [
            'labels' => $categories->pluck('name')->toArray(),
            'data' => $categories->map(function ($category) {
                    return $category->transactions->sum('amount');
                })->toArray()
            ];
    }
}