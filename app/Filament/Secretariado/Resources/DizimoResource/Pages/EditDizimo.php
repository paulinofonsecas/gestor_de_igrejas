<?php

namespace App\Filament\Secretariado\Resources\DizimoResource\Pages;

use App\Filament\Secretariado\Resources\DizimoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditDizimo extends EditRecord
{
    protected static string $resource = DizimoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['valor'] = str_replace(' ', '', $data['valor']);

        $record->update($data);

        return $record;
    }
}
