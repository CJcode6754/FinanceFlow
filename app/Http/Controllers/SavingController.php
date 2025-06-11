<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\SavingsTransaction;
use App\Services\CacheService;
use App\Services\SavingsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SavingController extends Controller
{
    public function __construct(
        private SavingsService $savingsService,
        private CacheService $cacheService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $analytics = $this->savingsService->getAnalyticsData(Auth::user()->id, $request);

        return view('admin.savings.index', [
            'totalSaved' => $analytics->totalSaved,
            'totalGoals' => $analytics->totalGoals,
            'activeGoals' => $analytics->activeGoals,
            'avgProgress' => $analytics->avgProgress,
            'transactionHistory' => $analytics->transactionHistory,
            'transaction_history' => $analytics->transactionHistory,
            'savings' => $analytics->savings,
        ]);
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

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);

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

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);

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
