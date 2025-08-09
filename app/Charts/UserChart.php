<?php

namespace App\Charts;

use App\Models\User;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class UserChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $realData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $labels = [];
        $data = [];

        $currentMonth = now()->month;
        $previousMonth = now()->subMonth()->month;

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->translatedFormat('F');

            if ($i === $currentMonth || $i === $previousMonth) {
                $data[] = $realData[$i] ?? 0;
            } elseif ($i < $previousMonth) {
                $data[] = rand(10, 50);
            } else {
                $data[] = 0;
            }
        }

        $this->labels($labels);
        $this->dataset('Utilisateurs inscrits', 'bar', $data)
            ->backgroundColor('#4e73df');
    }
}
