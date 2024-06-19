<?php

namespace App\Filament\Secretariado\Resources\MembroResource\Widgets;

use App\Models\Dizimo;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class DimosDoMesChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'dimosDoMesChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Dizimos do mês';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Passo 1: Recuperar os dados do banco de dados
        // Passo 1: Recuperar os dados do banco de dados
        $dizimos = Dizimo::all();

        // Passo 2: Processar os dados para extrair séries e categorias
        $data = [];

        foreach ($dizimos as $dizimo) {
            $day = $dizimo->created_at->format('d'); // Obtém o dia
            if (!isset($data[$day])) {
                $data[$day] = 0;
            }
            $data[$day] += $dizimo->valor; // Acumula o valor para o dia
        }

        $categories = array_keys($data);
        $series = array_values($data);

        // Passo 3: Retornar as informações na estrutura do gráfico
        return [
            'chart' => [
                'type' => 'donut',
                'height' => 300,
            ],
            'series' => $series,
            'labels' => $categories,
            'legend' => [
                'labels' => [
                    'fontFamily' => 'inherit',
                ],
            ],
        ];
    }
}
