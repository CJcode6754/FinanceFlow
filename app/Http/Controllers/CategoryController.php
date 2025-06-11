<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct(private CacheService $cacheService){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->input('type', 'expense');

        $query = Category::query()
            ->where('user_id', Auth::user()->id);

        if ($type && in_array($type, ['expense', 'income'])) {
            $query->where('type', $type);
        }

        $categories = $query->get();

        return view('admin.category.index', compact('categories', 'type'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100', 'string'],
            'type' => ['required', 'in:expense, income'],
            'icon' => ['required', 'string', 'max:50'],
        ]);

        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'icon' => $request->input('icon')
        ]);

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);

        return redirect()->route('category.index')->with('success', 'Succesfully created category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::authorize('update', $category);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        Gate::authorize('update', $category);

        $request->validate([
            'name' => ['max:100', 'string'],
            'type' => ['in:expense,income'],
            'icon' => ['required', 'string', 'max:50'],
        ]);

        $category->update([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'icon' => $request->input('icon')
        ]);

        $this->cacheService->flushUserDashboard(Auth::user()->id, 6);
        return redirect()->route('category.index')->with('success', 'Succesfully edited category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);

        if($category->image){
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return back()->with('success', 'Your category was deleted');
    }
}
