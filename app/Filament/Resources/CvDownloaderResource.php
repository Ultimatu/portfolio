<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CvDownloaderResource\Pages;
use App\Filament\Resources\CvDownloaderResource\RelationManagers;
use App\Models\CvDownloader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CvDownloaderResource extends Resource
{
    protected static ?string $model = CvDownloader::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square-stack';

    protected static ?string $activeNavigationIcon = 'heroicon-s-arrow-down-on-square-stack';

    protected static ?string $modelLabel = "Téléchargement CV";

    protected static ?string $navigationGroup = "Visiteurs";


    protected static ?string $navigationLabel = "Téléchargements CV";


    protected static ?string $pluralModelLabel = "Téléchargements CV";


    public static function canCreate():bool{
        return false;
    }

    public static function canEdit($record):bool{
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visitor.ip')
                    ->badge()
                    ->color('success')
                    ->sortable(),
                Tables\Columns\TextColumn::make('count')
                    ->badge()
                    ->color('success')
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCvDownloaders::route('/'),
            'create' => Pages\CreateCvDownloader::route('/create'),
            'edit' => Pages\EditCvDownloader::route('/{record}/edit'),
        ];
    }
}
