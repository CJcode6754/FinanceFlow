<form action="{{ route('savings.index') }}" method="get" class="flex items-center gap-4">
    <div>
        <select name="status_filter"
            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="all_goals" {{ request('status_filter') == 'all_goals' ? 'selected' : '' }}>All Goals</option>
            <option value="active" {{ request('status_filter') == 'active' ? 'selected' : '' }}>
                Active</option>
            <option value="completed" {{ request('status_filter') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div>
        <select name="sort"
            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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
        class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-blue-600 transition border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white">Filter</button>
</form>
