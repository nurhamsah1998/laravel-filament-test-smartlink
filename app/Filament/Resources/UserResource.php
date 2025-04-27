<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->can('view_any_user');
    }

    public static function canCreate(): bool
    {
        return Filament::auth()->user()?->can('create_user');
    }

    public static function canEdit(Model $record): bool
    {
        return Filament::auth()->user()?->can('update_user');
    }

    public static function canDelete(Model $record): bool
    {
        return Filament::auth()->user()?->can('delete_user');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')
                            ->email()
                            ->required()->unique(ignorable: fn($record) => $record),
                        TextInput::make('password')
                            ->password()
                            ->required(),
                        Select::make('roles')
                            ->label('Role Akses')
                            ->relationship('roles', 'name')
                    ])
                    ->columns(2),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data)
    {
        $data["password"] = Hash::make($data["password"]);
        return $data;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('roles.name')
                    ->label('Hak akses'),
                TextColumn::make('email')
                    ->label('Alamat email')->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
