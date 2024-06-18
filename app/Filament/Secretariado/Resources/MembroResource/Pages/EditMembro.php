<?php

namespace App\Filament\Secretariado\Resources\MembroResource\Pages;

use App\Filament\Secretariado\Resources\MembroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditMembro extends EditRecord
{
    protected static string $resource = MembroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // $tecnico = Membro::where('id', $data['id'])->first();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['genero_id'] = $data['genero'];
        $data['estado_civil_id'] = $data['estado_civil'];
        unset($data['genero']);
        unset($data['estado_civil']);

        $record->update($data);

        return $record;
    }
}
