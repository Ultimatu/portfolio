<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutMeResource\Pages;
use App\Filament\Resources\AboutMeResource\RelationManagers;
use App\Models\AboutMe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutMeResource extends Resource
{
    protected static ?string $model = AboutMe::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $activeNavigationIcon = 'heroicon-s-briefcase';

    protected static ?string $modelLabel = "A propos de moi";

    protected static ?string $navigationGroup = "A propos de moi";


    protected static ?string $navigationLabel = "A propos de moi";


    protected static ?string $pluralModelLabel = "A propos de moi";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom Complet')
                    ->prefixIcon('heroicon-s-user')
                    ->prefixIconColor('danger')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('cv')
                    ->required()
                    ->rule('mimes:pdf'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->prefixIcon('heroicon-s-phone')
                    ->prefixIconColor('danger')
                    ->label('Téléphone')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->prefixIcon('heroicon-s-envelope')
                    ->prefixIconColor('danger')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->prefixIcon('heroicon-s-map-pin')
                    ->prefixIconColor('danger')
                    ->maxLength(255),
                Forms\Components\TextInput::make('birthday')
                    ->required()
                    ->prefixIcon('heroicon-s-calendar')
                    ->prefixIconColor('danger')
                    ->maxLength(255),
                Forms\Components\TextInput::make('degree')
                    ->required()
                    ->label('Diplôme')
                    ->prefixIcon('heroicon-s-academic-cap')
                    ->prefixIconColor('success')
                    ->maxLength(255),
                Forms\Components\TextInput::make('experience')
                    ->prefixIcon('heroicon-s-briefcase')
                    ->prefixIconColor('success')
                    ->label('Années d\'expérience')
                    ->numeric()
                    ->required()
                    ->maxLength(2),
                // positions
                Forms\Components\Textarea::make('positions')
                    ->required()
                    ->default('Backend Developer, Java Developer, Web Developer, Lead Backend')
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('github')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('skype')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('discord')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('telegram')
                    ->tel()
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255)
                    ->prefixIcon('heroicon-s-link')
                    ->prefixIconColor('info')
                    ->default(null),
                Forms\Components\Toggle::make('freelance_status'),
                Forms\Components\Toggle::make('is_active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\ImageColumn::make('cv')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->badge()
                    ->icon('heroicon-s-phone')
                    ->color('danger')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->badge()
                    ->icon('heroicon-s-envelope-open')
                    ->color('danger')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->badge()
                    ->icon('heroicon-s-map-pin')
                    ->color('info')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->badge()
                    ->icon('heroicon-s-calendar')
                    ->color('info')
                    ->searchable(),
                Tables\Columns\TextColumn::make('degree')
                    ->badge()
                    ->icon('heroicon-s-briefcase')
                    ->color('danger')
                    ->searchable(),
                Tables\Columns\TextColumn::make('experience')
                    ->badge()
                    ->icon('heroicon-s-briefcase')
                    ->color('danger')
                    ->searchable(),
                Tables\Columns\TextColumn::make('positions')
                    ->badge()
                    ->icon('heroicon-s-briefcase')
                    ->color('danger')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('skype')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discord')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telegram')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->badge()
                    ->icon('heroicon-s-link')
                    ->color('warning')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('freelance_status')
                    ->label('Disponible pour Freelance?')
                    ->afterStateUpdated(fn($record, $state) => $record->update(['freelance_status' => $state])),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Actif?')
                    ->afterStateUpdated(fn($record, $state) => $record->update(['is_active' => $state])),
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
            'index' => Pages\ListAboutMes::route('/'),
            'create' => Pages\CreateAboutMe::route('/create'),
            'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
}
