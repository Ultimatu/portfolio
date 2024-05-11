<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievmentResource\Pages;
use App\Filament\Resources\AchievmentResource\RelationManagers;
use App\Models\Achievment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AchievmentResource extends Resource
{
    protected static ?string $model = Achievment::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $activeNavigationIcon = 'heroicon-s-check-badge';

    protected static ?string $modelLabel = "Prouesse";

    protected static ?string $navigationGroup = "A propos de moi";


    protected static ?string $navigationLabel = "Prouesses";


    protected static ?string $pluralModelLabel = "Prouesses";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('experience')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('happy_clients')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('projects_completed')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('awards_won')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('certifications')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('years_of_experience')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('happy_clients')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('projects_completed')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('awards_won')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('certifications')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('years_of_experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListAchievments::route('/'),
            'create' => Pages\CreateAchievment::route('/create'),
            'edit' => Pages\EditAchievment::route('/{record}/edit'),
        ];
    }
}
