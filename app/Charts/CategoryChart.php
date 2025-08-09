<?php

namespace App\Charts;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class CategoryChart extends Chart
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
        $categoryCount = Category::count();
        $this->labels(['Utilisateurs', 'Catégories', 'Produits']);
        $this->dataset('Répartition', 'doughnut', [$userCount, $categoryCount, $productCount])->backgroundColor(['#4e73df', '#1cc88a', '#ffaa00a6']);
    }
}
