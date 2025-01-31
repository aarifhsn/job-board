<?php

namespace App\Filament\Company\Widgets;

use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CompanyJobStat extends BaseWidget
{
    protected function getStats(): array
    {
        // if (Gate::denies('view-widgets')) {
        //     return [];
        // }
        $user = auth()->user();
        $company = $user->recruiter->company;
        $job_count = $company ? Job::where('company_id', $company->id)->count() : 0;
        $candidates_applied = $company
            ? Job::where('company_id', $company->id)->with('applicants')->count()
            : 0;

        return [
            Stat::make('Jobs', $job_count)
                ->description($job_count > 3 ? 'Job posting limit reached' : 'Active job postings')
                ->descriptionIcon($job_count > 3 ? 'heroicon-o-x-circle' : 'heroicon-o-briefcase', IconPosition::Before)
                ->color($job_count > 3 ? 'danger' : 'primary'),

            Stat::make('Candidates Applied', $candidates_applied)
                ->description($candidates_applied > 0 ? 'Applications increasing' : 'No applications yet')
                ->descriptionIcon($candidates_applied > 0 ? 'heroicon-o-trending-up' : 'heroicon-o-user', IconPosition::Before)
                ->color($candidates_applied > 0 ? 'success' : 'primary'),
        ];
    }
}
