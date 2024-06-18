<?php

namespace App\Filament\Secretariado\Resources;

use App\Filament\Secretariado\Resources\MembroResource\Pages;
use App\Filament\Secretariado\Resources\MembroResource\RelationManagers;
use App\Models\EstadoCivil;
use App\Models\Genero;
use App\Models\Membro;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembroResource extends Resource
{
    protected static ?string $model = Membro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->label('Informações pessoais')
                    ->schema([
                        Forms\Components\TextInput::make('nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('bi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('genero_id')
                            ->searchable()
                            ->relationship('generos', 'desc')
                            ->options(Genero::all()->pluck('desc', 'id'))
                            ->required(),
                        Forms\Components\DatePicker::make('data_nascimento')
                            ->required(),
                            Forms\Components\Select::make('estado_civil')
                            ->required()
                            ->label('Estado Civil')
                            ->searchable()
                            ->relationship('estado_civil', 'desc')
                            ->options(EstadoCivil::all()->pluck('desc', 'id')),
                        Forms\Components\TextInput::make('contacto')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nome_do_conjunge')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nome_do_pai')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nome_da_mae')
                            ->required()
                            ->maxLength(255),
                    ]),

                Fieldset::make()
                    ->label('Outras informações')
                    ->schema([
                        Forms\Components\TextInput::make('residencia')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('habitacoes_literarias')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('profissao')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ocupacao_atual')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('data_conversao')
                            ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('genero.desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_nascimento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_civil.desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contacto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profissao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ocupacao_atual')
                    ->searchable(),
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
            'index' => Pages\ListMembros::route('/'),
            'create' => Pages\CreateMembro::route('/create'),
            'edit' => Pages\EditMembro::route('/{record}/edit'),
        ];
    }
}
