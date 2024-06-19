<?php

namespace App\Filament\Secretariado\Resources\MembroResource\Widgets;

use App\Models\Genero;
use App\Models\Membro;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class MembrosAtivosChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'membrosAtivosChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Membros ativos';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Obter o ano atual e o mês atual
        $currentYear = date('Y');
        $currentMonth = date('n'); // 'n' retorna o mês sem zeros à esquerda (1-12)

        // Obter os dados do banco de dados agrupados por mês no ano atual
        $membrosPorMes = Membro::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Inicializar arrays para os dados do gráfico
        $categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, 12, 0);

        // Preencher os dados do gráfico com os valores obtidos do banco de dados
        foreach ($membrosPorMes as $item) {
            $data[$item->mes - 1] = $item->total;
        }

        // Truncar os arrays até o mês atual
        $categories = array_slice($categories, 0, $currentMonth);
        $data = array_slice($data, 0, $currentMonth);

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'MembroData',
                    'data' => $data,
                ],
            ],
            'xaxis' => [
                'categories' => $categories,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => [
                '#008FFB',
                '#00E396',
                '#FEB019',
                '#FF4560',
                '#775DD0',
                '#FF66C3',
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
            
        ];
    }
}
