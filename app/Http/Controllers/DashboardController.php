<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $countVisitors = DB::table('laravisits')->count();

        $articleVisitors = Article::whereBetween('created_at', [$startDate, $endDate])
            ->withTotalVisitCount()
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('l');
            })
            ->mapWithKeys(function ($item, $key) {
                return [$key => collect($item)->sum('visit_count_total')];
            })
            ->toArray();

        $articlePosted = Article::whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('l');
            })
            ->mapWithKeys(function ($item, $key) {
                return [$key => count($item)];
            })
            ->toArray();

        $visitorChart = new DashboardChart;
        $visitorChart->labels(array_keys($articleVisitors));
        $visitorChart->dataset('Visitors', 'line', array_values($articleVisitors));

        $articlesPostedChart = new DashboardChart;
        $articlesPostedChart->labels(array_keys($articlePosted));
        $articlesPostedChart->dataset('Articles Posted', 'line', array_values($articlePosted));

        $userCount = User::count();
        $articleCount = Article::count();

        return view('dashboardku', compact('visitorChart', 'articlesPostedChart', 'userCount', 'articleCount', 'countVisitors'));
    }
}
