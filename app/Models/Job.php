<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'category_id',
        'title',
        'description',
        'experience',
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
        'duration',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
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

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', '%'.$term.'%')
            ->orWhereHas('company', function ($q) use ($term) {
                $q->where('name', 'like', '%'.$term.'%');
            });
    }

    public function scopeFilterByCountry($query, $country)
    {
        if ($country) {
            return $query->where('country', $country);
        }

        return $query;
    }
}
