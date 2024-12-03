<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;

class Settings extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = UserResource::class;
    protected static string $view = 'filament.resources.user-resource.pages.settings';

    public function table(Table $table): static
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name'),
            ]);
    }
}
