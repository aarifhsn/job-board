<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'contact_number',
        'industry',
        'website',
        'logo',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'description',
        'status',
        'user_id',
    ];

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
