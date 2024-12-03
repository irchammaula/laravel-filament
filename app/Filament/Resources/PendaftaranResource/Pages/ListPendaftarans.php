<?php

namespace App\Filament\Resources\UserResource\Pages;

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftarans extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
