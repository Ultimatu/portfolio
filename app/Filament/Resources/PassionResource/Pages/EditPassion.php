<?php

namespace App\Filament\Resources\PassionResource\Pages;

use App\Filament\Resources\PassionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPassion extends EditRecord
{
    protected static string $resource = PassionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
