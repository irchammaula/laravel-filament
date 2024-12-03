<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\Settings;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    // protected static ?string $table = Settings::class;



    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Buat User Baru';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Informasi Dasar')
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->label('Nama'),
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->label('Email'),
                        ]),
                    Wizard\Step::make('Keamanan')
                        ->schema([
                            TextInput::make('password')
                                ->password()
                                ->revealable()
                                ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                                ->dehydrated(fn(?string $state): bool => filled($state))
                                ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                                ->label('Password'),
                        ]),
                    Wizard\Step::make('Roles')
                        ->schema([
                            Select::make('roles')
                                ->multiple()
                                ->relationship('roles', 'name'),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nama')
                    ->copyable()
                    ->copyMessage('berhasil copy coy'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('roles.name')
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            // 'index' => Pages\ListUsers::route('/'),
            'index' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            // 'set' => Pages\Settings::route('/set'),

        ];
    }
}
