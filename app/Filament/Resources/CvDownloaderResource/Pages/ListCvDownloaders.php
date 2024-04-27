<?php

namespace App\Filament\Resources\CvDownloaderResource\Pages;

use App\Filament\Resources\CvDownloaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCvDownloaders extends ListRecords
{
    protected static string $resource = CvDownloaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
