<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BudgetController extends Controller
{
    public function __construct(private CacheService $cacheService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgets = Budget::with('category')
            ->where('user_id', Auth::user()->id)
            ->get();
        $totalBudgetSpent = 0;
        $totalBudgets = 0;
        $totalBudgetRemaining = 0;
        $category_IDs = [];
        $chartLabels = [];
        
        foreach ($budgets as $budget) {
            $spentAmount = $budget->category->transactions()
                ->whereBetween('date', [$budget->start_date, $budget->end_date])
                ->sum('amount');

            $budget->spent = $spentAmount;
            $budget->remaining = $budget->amount - $spentAmount;
            $budget->percentage = $budget->amount > 0 ? min(100, ($spentAmount / $budget->amount) * 100) : 0;

            $totalBudgetSpent += $spentAmount;
            $totalBudgets += $budget->amount;
            $totalBudgetRemaining += $budget->remaining;
            $category_IDs[] = $budget->category_id;

            $chartLabels[] = $budget->category->name;

        }

        $totalCategoryIDs = count(array_unique($category_IDs));

        $chartData = $budgets->map(function ($bg) {
            return $bg->amount;
        })->toArray();

        return view('admin.budget.index', compact(
            'budgets',
            'totalBudgetSpent',
            'totalBudgets',
            'totalBudgetRemaining',
            'totalCategoryIDs',
            'chartLabels',
            'chartData'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::select(['id', 'name'])->get();
        return view('admin.budget.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'integer'],
            'amount' => ['integer', 'required'],
            'start_date' => ['date', 'required'],
            'end_date' => ['date', 'required'],
        ]);

        Budget::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'amount' => $request->input('amount'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);

        return redirect()->route('budget.index')->with('success', 'Successfully created new budget');
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        Gate::authorize('update', $budget);

        $categories = Category::select('id', 'name')->get();
        $budget->with('category')->get();

        return view('admin.budget.edit', compact('categories', 'budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budget $budget)
    {
        Gate::authorize('update', $budget);

        $request->validate([
            'category_id' => ['required', 'integer'],
            'amount' => ['integer', 'required'],
            'start_date' => ['date', 'required'],
            'end_date' => ['date', 'required'],
        ]);

        $budget->update([
            'category_id' => $request->input('category_id'),
            'amount' => $request->input('amount'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);
        
        return redirect()->route('budget.index')->with('success', 'Successfully edit the selected budget');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        Gate::authorize('delete', $budget);

        $budget->delete();

        return redirect()->route('budget.index')->with('success', 'Successfully deleted the selected budget');
    }
}
