<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Akaunting\Apexcharts\Chart;
use App\Charts\BestProductsChart;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $chart = BestProductsChart::make();
            
        return view('admin.dashboard', compact('chart'));
    }
}