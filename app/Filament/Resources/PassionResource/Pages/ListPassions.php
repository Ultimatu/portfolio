<?php

namespace App\Filament\Resources\PassionResource\Pages;

use App\Filament\Resources\PassionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPassions extends ListRecords
{
    protected static string $resource = PassionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
