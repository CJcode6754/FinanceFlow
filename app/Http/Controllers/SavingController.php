<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\SavingsTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $savings = Saving::with('savingsTransactions')
            ->where('user_id', $user->id)
            ->get();

        foreach ($savings as $saving) {
            $deposit = $saving->savingsTransactions
                ->where('type', 'deposit')
                ->sum('amount');

            $withdraw = $saving->savingsTransactions
                ->where('type', 'withdraw')
                ->sum('amount');

            $currentAmount = $deposit - $withdraw;

            $saving->current_amount = $currentAmount;

            $saving->process_percent = $saving->target_amount > 0 ? min(100, round(($currentAmount / $saving->target_amount) * 100, 2)) : 0;
        }

        $totalSaved = SavingsTransaction::whereHas('savings', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('type', 'deposit')->sum('amount');

        $totalGoals = $savings->sum('target_amount');

        $activeGoals = $savings->filter(function ($saving) {
            return $saving->current_amount < $saving->target_amount
                && Carbon::parse($saving->deadline)->isFuture();
        })->count();

        $avgProgress = $savings->count() > 0
            ? round($savings->avg('process_percent'), 2)
            : 0;

        $transaction_history = SavingsTransaction::with('savings')
            ->whereHas('savings', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.savings.index', compact('savings', 'transaction_history', 'totalSaved', 'totalGoals', 'activeGoals', 'avgProgress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.savings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:100'],
            'target_amount' => ['required', 'integer'],
            'current_amount' => ['nullable', 'integer'],
            'note' => ['nullable', 'string', 'max:50'],
            'deadline' => ['date', 'required']
        ]);

        Saving::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'icon' => $request->input('icon'),
            'target_amount' => $request->input('target_amount'),
            'current_amount' => $request->input('current_amount'),
            'note' => $request->input('note'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('savings.index')->with('success', 'Successfully Added New Savings');
    }

    /**
     * Display the specified resource.
     */
    public function show(Saving $saving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saving $saving)
    {
        Gate::authorize('update', $saving);

        return view('admin.savings.edit', compact('saving'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saving $saving)
    {
        Gate::authorize('update', $saving);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:100'],
            'target_amount' => ['required', 'integer'],
            'current_amount' => ['nullable', 'integer'],
            'note' => ['nullable', 'string', 'max:50'],
            'deadline' => ['date', 'required']
        ]);

        $saving->update([
            'name' => $request->input('name'),
            'icon' => $request->input('icon'),
            'target_amount' => $request->input('target_amount'),
            'current_amount' => $request->input('current_amount'),
            'note' => $request->input('note'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('savings.index')->with('success', 'Successfully Edit Savings Details');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saving $saving)
    {
        Gate::authorize('delete', $saving);

        $saving->delete();

        return redirect()->route('savings.index')->with('success', 'Successfully Deleted Selected Saving');
    }

    public function transaction($id)
    {
        $saving = Saving::findOrFail($id);

        return view('admin.savings.transaction', compact('saving'));
    }

    public function transactionStore(Request $request, SavingsTransaction $saving)
    {
        $request->validate([
            'amount' => ['required', 'integer'],
            'transaction' => ['required', 'in:deposit,withdraw'],
            'note' => ['required', 'string', 'max:100'],
            'date' => ['required', 'date']
        ]);

        $saving->create([
            'saving_id' => $request->input('saving_id'),
            'amount' => $request->input('amount'),
            'type' => $request->input('transaction'),
            'date' => $request->input('date'),
            'note' => $request->input('note')
        ]);

        return redirect()->route('savings.index')->with('success', 'Successfully finish the transaction');
    }
}
