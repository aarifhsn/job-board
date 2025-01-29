<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Filament\Resources\JobResource\Widgets\JobPostsChart;
use App\Models\Job;
use Doctrine\DBAL\Query\Limit;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Filament\Resources\JobResource\Widgets\StatsOverview;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationGroup = 'Adminstration';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required()
                    ->label('Company')
                    ->searchable(),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Category')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->label('New Category Name'),
                    ])
                    ->placeholder('Select or create Category'),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Job Title'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Job Description'),

                Select::make('tag')
                    ->relationship('tag', 'name')
                    ->multiple()
                    ->label('Tags')
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->label('New Tag Name'),
                    ])
                    ->placeholder('Select or create tags'),

                Forms\Components\TextInput::make('experience')
                    ->maxLength(255)
                    ->label('Experience'),

                Forms\Components\Select::make('type')
                    ->options([
                        'full-time' => 'Full-Time',
                        'part-time' => 'Part-Time',
                        'contract' => 'Contract',
                        'temporary' => 'Temporary',
                        'internship' => 'Internship',
                        'volunteer' => 'Volunteer',
                        'freelance' => 'Freelance',
                    ])
                    ->default('full-time')
                    ->required()
                    ->label('Job Type'),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', str($state)->slug()))
                    ->label('Slug'),

                Forms\Components\TextInput::make('vacancy')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->label('Number of Vacancies'),

                Forms\Components\TextInput::make('qualification')
                    ->label('Qualification'),

                Forms\Components\TextInput::make('duration')
                    ->label('Duration'),

                Forms\Components\TextInput::make('location')
                    ->required()
                    ->label('Location'),

                Forms\Components\TextInput::make('salary_range')
                    ->required()
                    ->label('Salary Range'),

                Forms\Components\TextInput::make('application_link')
                    ->url()
                    ->nullable()
                    ->label('Application Link'),

                Forms\Components\TextInput::make('circular_link')
                    ->url()
                    ->nullable()
                    ->label('Circular Link'),

                Forms\Components\TextInput::make('application_email')
                    ->email()
                    ->required()
                    ->label('Application Email'),

                Forms\Components\TextInput::make('application_phone')
                    ->required()
                    ->label('Application Phone'),

                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Start Date'),

                Forms\Components\DateTimePicker::make('expiration_date')
                    ->label('Expiration Date'),

                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'expired' => 'Expired',
                    ])
                    ->default('active')
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Job Title'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->label('Job Type'),

                TextColumn::make('tag.name')
                    ->label('Tags')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Location'),

                Tables\Columns\TextColumn::make('salary_range')
                    ->label('Salary Range'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),

                Tables\Columns\TextColumn::make('expiration_date')
                    ->label('Expiration Date')
                    ->date(),
                Tables\Columns\TextColumn::make('view_count')
                    ->label('Total Views')
                    ->sortable(),
                Tables\Columns\TextColumn::make('click_count')
                    ->label(
                        'Total Apply Clicks'
                    )->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'expired' => 'Expired',
                    ])
                    ->label('Filter by Status'),

                Tables\Filters\Filter::make('expired')
                    ->query(fn($query) => $query->where('expiration_date', '<', now()))
                    ->label('Expired Jobs'),
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('view_count'),
                Tables\Filters\Filter::make('click_count'),
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Manage Jobs';
    }
    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
            JobPostsChart::class
        ];
    }


}
