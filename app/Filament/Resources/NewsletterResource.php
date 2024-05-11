<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterResource\Pages;
use App\Filament\Resources\NewsletterResource\RelationManagers;
use App\Models\Newsletter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    protected static ?string $activeNavigationIcon = 'heroicon-s-envelope-open';

    protected static ?string $modelLabel = "Newsletter";

    protected static ?string $navigationGroup = "Visiteurs";


    protected static ?string $navigationLabel = "Newsletter";


    protected static ?string $pluralModelLabel = "Newsletter";

    public static function canCreate():bool{
        return false;
    }

   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\DateTimePicker::make('subscribed_at'),
                Forms\Components\DateTimePicker::make('unsubscribed_at'),
                Forms\Components\TextInput::make('unsubscribed_reason')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('unsubscribed_ip')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->afterStateUpdated(fn($record, $state) => $record->update(['is_active' => $state])),
                Tables\Columns\TextColumn::make('subscribed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unsubscribed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unsubscribed_reason')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unsubscribed_ip')
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
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletter::route('/create'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
        ];
    }
}
