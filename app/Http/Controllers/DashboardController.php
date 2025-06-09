<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}
    public function index(Request $request)
    {
        $months = $this->getFilterMonths($request);
        $dashboardData = $this->dashboardService->getDashboardData(Auth::id(), $months);

        return view('admin.dashboard', $dashboardData);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/');
    }

    private function getFilterMonths(Request $request): int
    {
        $allowedMonths = [1, 2, 3, 6, 9, 12];
        $requestedMonths = (int) $request->filter_by_months;

        return in_array($requestedMonths, $allowedMonths) ? $requestedMonths : 6;
    }
}
