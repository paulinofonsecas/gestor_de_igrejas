<?php

namespace App\Filament\Secretariado\Resources\DizimoResource\Pages;

use App\Filament\Secretariado\Resources\DizimoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDizimo extends CreateRecord
{
    protected static string $resource = DizimoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['valor'] = str_replace(' ', '', $data['valor']);
        return $data;
    }
}
