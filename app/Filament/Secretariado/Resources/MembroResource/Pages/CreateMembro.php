<?php

namespace App\Filament\Secretariado\Resources\MembroResource\Pages;

use App\Filament\Secretariado\Resources\MembroResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMembro extends CreateRecord
{
    protected static string $resource = MembroResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['genero_id'] = $data['genero'];
        $data['estado_civil_id'] = $data['estado_civil'];
        unset($data['genero']);
        unset($data['estado_civil']);
        return $data;
    }
}
