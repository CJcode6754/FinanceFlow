<form action="{{ route('savings.index') }}" method="get" class="flex items-center gap-4">
    <div>
        <select name="status_filter"
            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="all_goals" {{ request('status_filter') == 'all_goals' ? 'selected' : '' }}>All Goals</option>
            <option value="active" {{ request('status_filter') == 'active' ? 'selected' : '' }}>
                Active</option>
            <option value="completed" {{ request('status_filter') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div>
        <select name="sort"
            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option value="sort_by">Sort by</option>
            <option value="sort_by_date" {{ request('sort') == 'sort_by_date' ? 'selected' : '' }}>
                Sort by Date (Asc)
            </option>
            <option value="sort_by_date_desc" {{ request('sort') == 'sort_by_date' ? 'selected' : '' }}>
                Sort by Date (Desc)
            </option>
            <option value="sort_by_amount" {{ request('sort') == 'sort_by_amount' ? 'selected' : '' }}>
                Sort by Amount (Asc)
            </option>
            <option value="sort_by_amount_desc" {{ request('sort') == 'sort_by_amount' ? 'selected' : '' }}>
                Sort by Amount (Desc)
            </option>
            <option value="sort_by_progress" {{ request('sort') == 'sort_by_progress' ? 'selected' : '' }}>
                Sort by Progress (Asc)
            </option>
            <option value="sort_by_progress_desc" {{ request('sort') == 'sort_by_progress' ? 'selected' : '' }}>
                Sort by Progress (Desc)
            </option>
        </select>
    </div>

    <button type="submit"
        class="btn px-4 py-2">Filter</button>
</form>
