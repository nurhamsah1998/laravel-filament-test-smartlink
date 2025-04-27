<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pengguna', User::count())
                ->description('Total pengguna smart todo'),
            Stat::make('Tugas', Task::count())
                ->description('Total tugas pada semua project'),
            Stat::make('Project', Project::count())
                ->description('Total project'),
        ];
    }
}
