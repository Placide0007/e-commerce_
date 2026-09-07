<?php

namespace App\Charts;

use Akaunting\Apexcharts\Chart;
use App\Models\OrderItem;

class BestProductsChart
{
    public static function make()
    {
        $products = OrderItem::with('product')
            ->selectRaw('product_id, SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(10)
            ->get();

        return (new Chart)
            ->setType('line')
            ->setHeight(350)
            ->setLabels($products->pluck('product.name')->toArray())
            ->setDataset(
                'Ventes',
                'column',
                $products->pluck('total_sold')->toArray()
            )
            ->setDataset(
                'Tendance',
                'line',
                $products->pluck('total_sold')->toArray()
            )
            ->setOptions([
                'colors' => [
                    '#ffffff',
                    '#ef4444',
                ],
                'xaxis' => [
                    'labels' => [
                        'style' => [
                            'colors' => '#ffffff',
                            'fontSize' => '12px',
                            'fontWeight' => 500,
                        ],
                    ],
                ],
                'yaxis' => [
                    'labels' => [
                        'style' => [
                            'colors' => '#ffffff',
                            'fontSize' => '12px',
                        ],
                    ],
                ],
                'plotOptions' => [
                    'bar' => [
                        'borderRadius' => 1,
                        'columnWidth' => '20%',
                    ],
                ],
                'stroke' => [
                    'width' => [0, 3],
                    'curve' => 'straight',
                ],
                'grid' => [
                    'show' => false,
                ],
                'dataLabels' => [
                    'enabled' => true,
                    'enabledOnSeries' => [1],
                ],
                'legend' => [
                    'labels' => [
                        'colors' => '#ffffff',
                    ],
                ],
            ]);
    }
}

