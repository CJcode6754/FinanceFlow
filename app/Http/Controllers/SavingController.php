<?php

namespace App\Http\Controllers;

use App\Models\Saving;
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
        $savings = Saving::with('savingsTransactions')->get();

        foreach($savings as $saving){
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

        return view('admin.savings.index', compact('savings'));
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
}
