<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CobaWidget extends BaseWidget
{
    // Properti pollingInterval seharusnya di luar method
    protected static ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('User', User::count())
                ->chart([50, 100])
                ->color('success'),
        ];
    }
}
