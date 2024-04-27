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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('cv')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('birthday')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('degree')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('experience')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('github')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('skype')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('discord')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('telegram')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('freelance_status')
                    ->required(),
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
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('cv')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->searchable(),
                Tables\Columns\TextColumn::make('degree')
                    ->searchable(),
                Tables\Columns\TextColumn::make('experience')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github')
                    ->searchable(),
                Tables\Columns\TextColumn::make('skype')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discord')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telegram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable(),
                Tables\Columns\IconColumn::make('freelance_status')
                    ->boolean(),
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
            'index' => Pages\ListAboutMes::route('/'),
            'create' => Pages\CreateAboutMe::route('/create'),
            'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
}
