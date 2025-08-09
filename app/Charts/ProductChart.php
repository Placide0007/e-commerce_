<?php

namespace App\Charts;

use App\Models\Product;
use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class ProductChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $userCount = User::count();
        $productCount = Product::count();
        $this->labels(['Utilisateurs', 'Produits']);
        $this->dataset('Répartition', 'doughnut', [$userCount, $productCount])->backgroundColor(['#4e73df', '#1cc88a']);
    }
}
