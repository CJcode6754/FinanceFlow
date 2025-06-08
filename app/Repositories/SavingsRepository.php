<?php

namespace App\Repositories;

use App\Models\Saving;
use App\Models\SavingsTransaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SavingsRepository
{
    public function getSavingsProgress(int $userId): Collection
    {
        return Saving::with('savingsTransactions')
            ->where('user_id', $userId)
            ->get();
    }

    public function getTotalSaved(int $userId): float
    {
        return (float) (SavingsTransaction::whereHas('savings', function ($query) use ($userId): void {
            $query->where('user_id', $userId);
        })->where('type', 'deposit')
            ->sum('amount') ?? 0);
    }

    public function getTransactionHistory(int $userId, int $perPage = 10)
    {
        return SavingsTransaction::with('savings')
            ->whereHas('savings', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function applyFilters(Collection $savings, Request $request)
    {
        if ($request->filled('status_filter') && $request->status_filter !== 'all_goals') {
            if ($request->input('status_filter') == 'active') {
                $savings = $savings->filter(function ($saving): bool {
                    return $saving->current_amount < $saving->target_amount
                        && Carbon::parse($saving->deadline)->isFuture();
                });
            } else if ($request->input('status_filter') == 'completed') {
                $savings = $savings->filter(function ($saving): bool {
                    return $saving->current_amount >= $saving->target_amount
                        || Carbon::parse($saving->deadline)->isPast();
                });
            }
        }

        if ($request->filled('sort') && $request->sort !== 'sort_by') {
            if ($request->input('sort') == 'sort_by_amount') {
                $savings = $savings->sortBy('target_amount');
            } elseif ($request->input('sort') == 'sort_by_amount_desc') {
                $savings = $savings->sortByDesc('target_amount');
            } elseif ($request->input('sort') == 'sort_by_date') {
                $savings = $savings->sortBy('created_at');
            } elseif ($request->input('sort') == 'sort_by_date_desc') {
                $savings = $savings->sortByDesc('created_at');
            } elseif ($request->input('sort') == 'sort_by_progress') {
                $savings = $savings->sortBy('process_percent');
            } elseif ($request->input('sort') == 'sort_by_progress_desc') {
                $savings = $savings->sortByDesc('process_percent');
            }
        }

        return $savings->values();
    }

    public function countActiveGoals(Collection $savings): int
    {
        $count = $savings->filter(function ($saving) {
            return isset($saving->current_amount) 
                && isset($saving->target_amount) 
                && isset($saving->deadline)
                && $saving->current_amount < $saving->target_amount
                && Carbon::parse($saving->deadline)->isFuture();
        })->count();
        
        return $count ?? 0;
    }

    public function getAverageProgress(Collection $savings): float
    {
        if ($savings->count() === 0) {
            return 0.0;
        }
        
        $average = $savings->avg('process_percent');
        return round($average ?? 0, 2);
    }

    public function getTotalGoals(Collection $savings): float
    {
        return (float) ($savings->sum('target_amount') ?? 0);
    }
}