<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'slug',
        'vacancy',
        'location',
        'salary_range',
        'application_link',
        'application_email',
        'application_phone',
        'start_date',
        'expiration_date',
        'status',
        'duration'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobClicks()
    {
        return $this->hasMany(JobClick::class);
    }

    public function jobViews()
    {
        return $this->hasMany(JobView::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
