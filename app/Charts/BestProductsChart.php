<?php

namespace App\Charts;

use Akaunting\Apexcharts\Chart;

class BestProductsChart
{
    public static function make()
    {
        return (new Chart)
            ->setType('line')
            ->setHeight(350)

            ->setLabels([
                'Riz 5kg',
                'Huile 1L',
                'Sucre 1kg',
                'Lait',
                'Café'
            ])

            ->setDataset('Ventes', 'column', [
                125,
                98,
                80,
                62,
                45
            ])

            ->setDataset('Tendance', 'line', [
                125,
                98,
                80,
                62,
                45
            ])

            ->setOptions([
                'colors' => [
                    '#1e293b',
                    '#1e293b',
                ],

                'plotOptions' => [
                    'bar' => [
                        'borderRadius' => 1,
                        'columnWidth' => '15%',
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

                    'style' => [
                        'fontSize' => '12px',
                        'fontWeight' => 500,
                    ],
                ],
            ]);
    }
}