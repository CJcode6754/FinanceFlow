<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Services\CacheService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    public function __construct(private CacheService $cacheService){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::with(['category', 'wallet'])->where('user_id', Auth::user()->id);

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if($request->filled('wallet')){
            $query->whereHas('wallet', function($q) use ($request) {
                $q->where('type', $request->wallet);
            });
        }

        if ($request->filled('date_filter')) {
            $today = Carbon::today();

            switch ($request->date_filter) {
                case 'today':
                    $query->where('date', $today);
                    break;
                case 'this_week':
                    $query->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereMonth('date', $today->month)->whereYear('date', $today->year);
                    break;
                case 'last_month':
                    $query->whereMonth('date', $today->copy()->subMonth()->month)
                        ->whereYear('date', $today->copy()->subMonth()->year);
                    break;
                case 'last_3_months':
                    $query->whereBetween('date', [Carbon::now()->subMonths(3), Carbon::now()]);
                    break;
                case 'last_6_months':
                    $query->whereBetween('date', [Carbon::now()->subMonths(6), Carbon::now()]);
                    break;
                case 'this_year':
                    $query->whereYear('date', $today->year);
                    break;
            }
        }

        $transaction = $query->latest()->paginate(10);

        return view('admin.transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $wallet = Wallet::all();
        return view('admin.transaction.create', compact('category', 'wallet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'integer'],
            'note' => ['required', 'max:100', 'string'],
            'amount' => ['integer', 'required'],
            'type' => ['required'],
            'wallet_id' => ['required', 'integer'],
            'date' => ['date', 'required'],
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'wallet_id' => $request->input('wallet_id'),
            'category_id' => $request->input('category_id'),
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'note' => $request->input('note'),
            'date' => $request->input('date')
        ]);

        $wallet = $transaction->wallet;

        if($transaction->type === 'income'){
            $wallet->balance += $transaction->amount;
        }else{
            $wallet->balance -= $transaction->amount;
        }

        $wallet->save();

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);

        return redirect()->route('transaction.index')->with('success', 'Successfully create new transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        Gate::authorize('update', $transaction);

        $categories = Category::all();
        $wallets = Wallet::all();
        return view('admin.transaction.edit', compact('transaction', 'categories', 'wallets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        Gate::authorize('update', $transaction);

        $request->validate([
            'category_id' => ['required', 'integer'],
            'note' => ['required', 'max:100', 'string'],
            'amount' => ['integer', 'required'],
            'type' => ['required'],
            'wallet_id' => ['required', 'integer'],
            'date' => ['date', 'required'],
        ]);

        $transaction->update([
            'category_id' => $request->input('category_id'),
            'note' => $request->input('note'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type'),
            'wallet_id' => $request->input('wallet_id'),
            'date' => $request->input('date'),
        ]);

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);

        return redirect()->route('transaction.index')->with('success', 'Successdully update transaction');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Gate::authorize('delete', $transaction);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Successfully deleted the transaction');
    }
}
