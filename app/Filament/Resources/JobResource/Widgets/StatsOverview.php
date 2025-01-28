<?php

namespace App\Filament\Resources\JobResource\Widgets;

use App\Models\Company;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Job;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jobs', Job::count()),
            Stat::make('Companies', Company::count()),
            Stat::make('Users', User::count()),
        ];
    }
}
