<?php

namespace App\Filament\Resources\CvDownloaderResource\Pages;

use App\Filament\Resources\CvDownloaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCvDownloader extends EditRecord
{
    protected static string $resource = CvDownloaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
