<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

  protected static ?string $navigationIcon = 'heroicon-o-home'; // Icône de menu
    protected static ?string $navigationGroup = 'Gestion des Hotels'; // Groupe de menu


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations de l’hôtel')
                    ->schema([
                        TextInput::make('name')
                            ->label("Nom de l'hôtel")
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->required(),

                        TextInput::make('price_per_night')
                            ->label('Prix par nuit (€)')
                            ->numeric()
                            ->required(),
                        FileUpload::make('image') // Ajout du champ upload
                            ->label('Image de l’hôtel')
                            ->image()
                            ->directory('properties') // Dossier de stockage
                            ->required(),
                    ])
                    ->columnSpan(2),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
            ImageColumn::make('image') // Ajout de la colonne image
                ->label('Image')
                ->circular() // Affiche une image ronde (optionnel)
                ->size(50), // Taille de l’image

            TextColumn::make('name')
                ->label("Nom de l'hôtel")
                ->sortable(),

            TextColumn::make('price_per_night')
                ->label('Prix par nuit (€)')
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Date de création')
                ->date(),
        ])
            ->filters([
                // Ajout de filtres ici si nécessaire
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
