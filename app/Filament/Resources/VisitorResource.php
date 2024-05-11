<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Filament\Resources\VisitorResource\RelationManagers;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    protected static ?string $activeNavigationIcon = 'heroicon-s-eye';

    protected static ?string $modelLabel = "Visiteur";

    protected static ?string $navigationGroup = "Visiteurs";


    protected static ?string $navigationLabel = "Visiteurs";


    protected static ?string $pluralModelLabel = "Visiteurs";


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
                Forms\Components\TextInput::make('ip')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('session_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('has_downloaded_cv')
                    ->required(),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('state')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('state_code')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('zip')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('is_first_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('last_visit_at'),
                Forms\Components\DateTimePicker::make('first_visit_at'),
                Forms\Components\TextInput::make('device')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('visits')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('browser')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ip')
                    ->badge()
                    ->color('danger')
                    ->icon('heroicon-o-globe-alt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('session_id')
                    ->badge()
                    ->color('primary')
                    ->icon('heroicon-o-command-line')
                    ->searchable(),
                Tables\Columns\IconColumn::make('has_downloaded_cv')
                    ->boolean(),
                Tables\Columns\TextColumn::make('country')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-globe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-globe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-globe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state_code')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-globe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-globe')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_first_time')
                    ->boolean(),
                Tables\Columns\TextColumn::make('last_visit_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_visit_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('device')
                    ->badge()
                    ->color('warning')
                    ->icon('heroicon-o-device-tablet')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visits')
                    ->badge()
                    ->color('warning')
                    ->icon('heroicon-s-arrow-trending-up')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('browser')
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
            'index' => Pages\ListVisitors::route('/'),
            'create' => Pages\CreateVisitor::route('/create'),
            'edit' => Pages\EditVisitor::route('/{record}/edit'),
        ];
    }
}
