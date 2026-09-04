<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Akaunting\Apexcharts\Chart;
use App\Charts\BestProductsChart;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $chart = BestProductsChart::make();

        $users = User::where('role', 'customer')->get();
            
        return view('admin.dashboard', compact('chart' , 'users'));
    }
}