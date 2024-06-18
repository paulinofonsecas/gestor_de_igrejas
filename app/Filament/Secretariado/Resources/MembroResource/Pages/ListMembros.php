<?php

namespace App\Filament\Secretariado\Resources\MembroResource\Pages;

use App\Filament\Secretariado\Resources\MembroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembros extends ListRecords
{
    protected static string $resource = MembroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
