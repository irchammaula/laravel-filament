<?php

// namespace App\Filament\Widgets;

// use Filament\Widgets\Widget;

// class CurrentTimeWidget extends Widget
// {
//     protected static string $view = 'filament.widgets.current-time-widget'; // Menggunakan view kustom untuk widget

//     public function form()
//     {
//         return [
//             TimePicker::make('current_time')
//                 ->label('Waktu Sekarang')
//                 ->default(Carbon::now()->format('H:i')), // Set waktu saat ini sebagai default
//         ];
//     }
// }

// namespace App\Filament\Widgets;

// use App\Models\User;
// use Filament\Widgets\StatsOverviewWidget as BaseWidget;
// use Filament\Widgets\StatsOverviewWidget\Stat;
// use Filament\Widgets\WidgetConfiguration
// use Carbon\Carbon;

// class TimeWidget extends BaseWidget
// {
//     // Properti pollingInterval seharusnya di luar method

//     protected function getStats(): array
//     {
//         return [
//             TimePicker::make('current_time')
//                 ->label('Waktu Sekarang')
//                 ->default(Carbon::now()->format('H:i')), // Set waktu saat ini sebagai default
//         ];
//     }
// }
