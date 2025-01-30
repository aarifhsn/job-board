<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Job;
use App\Models\JobClick;
use App\Models\JobView;

class CompanyStats extends BaseWidget
{
    protected function getStats(): array
    {
        $companyId = auth()->user()->company_id;

        // Get all jobs of this company
        $jobs = Job::where('company_id', $companyId)->pluck('id');

        return [
            Stat::make('Total Jobs', Job::where('company_id', $companyId)->count()),
            Stat::make('Total Views', JobView::whereIn('job_id', $jobs)->count()),
            Stat::make('Total Apply Clicks', JobClick::whereIn('job_id', $jobs)->count()),
        ];
    }
}
