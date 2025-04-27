<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\ChartWidget;

class TaskWidget extends ChartWidget
{
    protected static ?string $heading = 'Total status tugas';

    protected function getData(): array
    {
        $total_task_todo = Task::where('status', 'To Do')->count();
        $total_task_inProgress = Task::where('status', 'In Progress')->count();
        $total_task_done = Task::where('status', 'Done')->count();
        $total_task_deadLine = Task::where('status', 'Deadline')->count();
        return [
            'datasets' => [
                [
                    'label' => ' Total dari semua project',
                    'data' => [$total_task_todo, $total_task_inProgress, $total_task_done, $total_task_deadLine,],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['To Do', 'In Progress', 'Done', 'Deadline',],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
