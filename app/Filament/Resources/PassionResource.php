<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PassionResource\Pages;
use App\Filament\Resources\PassionResource\RelationManagers;
use App\Models\Passion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PassionResource extends Resource
{
    protected static ?string $model = Passion::class;

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-ripple';


    protected static ?string $activeNavigationIcon = 'heroicon-s-cursor-arrow-ripple';

    protected static ?string $modelLabel = "Passion";

    protected static ?string $navigationGroup = "A propos de moi";


    protected static ?string $navigationLabel = "Passions";


    protected static ?string $pluralModelLabel = "Passions";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('fa_icon')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fa_icon')
                    ->searchable(),
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
            'index' => Pages\ListPassions::route('/'),
            'create' => Pages\CreatePassion::route('/create'),
            'edit' => Pages\EditPassion::route('/{record}/edit'),
        ];
    }
}
