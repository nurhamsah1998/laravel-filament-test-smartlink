<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Permission;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->can('view_any_project') ?? false;
    }

    public function canCreate(): bool
    {
        return Filament::auth()->user()?->can('create_project') ?? false;
    }

    public function canEdit(Model $record): bool
    {
        return Filament::auth()->user()?->can('update_project') ?? false;
    }

    public function canDelete(Model $record): bool
    {
        return Filament::auth()->user()?->can('delete_project') ?? false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('assigned_to')
                    // ->disableOptionWhen(fn(): bool => true)
                    // ->visible(fn($livewire) => !$livewire instanceof \Filament\Resources\RelationManagers\RelationManager)
                    ->label('Ditugaskan Ke')
                    ->required()
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
                Select::make('status')

                    ->options([
                        'To Do' => 'To Do',
                        'In Progress' => 'In Progress',
                        'Done' => 'Done',
                        'Deadline' => 'Deadline',
                    ])->default('To Do'),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data)
    {
        $data['project_id'] = $this->ownerRecord->id;
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                TextColumn::make('user.name')
                    ->label('Ditugaskan ke')
                    ->placeholder("-"),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'To Do' => 'gray',
                        'In Progress' => 'warning',
                        'Done' => 'success',
                        'Deadline' => 'danger',
                    })
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->deferLoading();
    }
}
