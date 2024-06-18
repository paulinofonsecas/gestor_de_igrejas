<?php

namespace App\Filament\Secretariado\Resources\DizimoResource\Pages;

use App\Filament\Secretariado\Resources\DizimoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDizimos extends ListRecords
{
    protected static string $resource = DizimoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
