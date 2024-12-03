<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Pages\Page;
use App\Filament\Pages\UsersView;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Filament\PluginServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
