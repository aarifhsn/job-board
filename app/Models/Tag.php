<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug'];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_tags');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%'.$search.'%');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeTrending($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
