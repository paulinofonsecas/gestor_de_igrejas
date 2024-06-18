<?php

namespace App\Filament\Secretariado\Resources;

use App\Filament\Secretariado\Resources\DizimoResource\Pages;
use App\Models\Dizimo;
use App\Models\Membro;
use App\Models\MetodoPagamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;

class DizimoResource extends Resource
{
    protected static ?string $model = Dizimo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('membro_id')
                    ->searchable()
                    ->relationship('membro', 'nome')
                    ->options(Membro::all()->pluck('nome', 'id'))
                    ->required(),
                Forms\Components\DatePicker::make('data')
                    ->required(),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->mask(RawJs::make('$money($input, \'.\', \' \')'))
                    ->placeholder('2,250'),
                Forms\Components\Select::make('metodo_pagamento_id')
                    ->searchable()
                    ->relationship('metodoPagamento', 'desc')
                    ->options(MetodoPagamento::all()->pluck('desc', 'id'))
                    ->default('1')
                    ->required(),
                Forms\Components\Textarea::make('descricao')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('membro.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('metodoPagamento.desc')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        MetodoPagamento::Dinheiro => 'success',
                        MetodoPagamento::TPA => 'warning',
                        MetodoPagamento::Tranferencia => 'grey',
                        MetodoPagamento::Cheque => 'danger',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDizimos::route('/'),
            'create' => Pages\CreateDizimo::route('/create'),
            'edit' => Pages\EditDizimo::route('/{record}/edit'),
        ];
    }
}
