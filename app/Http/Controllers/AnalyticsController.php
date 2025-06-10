<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends Controller
{
    public function __construct(
        private AnalyticsService $analyticsService
    ){}

    public function index(Request $request){
        $userId = Auth::user()->id;
        $months = $this->getFilterMonths($request);
        
        $datas = $this->analyticsService->getAnalyticsData($userId, $months);
        // dd($datas);

        return view('admin.analytics.index',$datas);
    }

    protected function getFilterMonths(Request $request): int
    {
        $allowedMonths = [1, 2, 3, 6, 9, 12];
        $requestedMonths = (int) $request->filter_by_months;

        return in_array($requestedMonths, $allowedMonths) ? $requestedMonths : 6;
    }
}
