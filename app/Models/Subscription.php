<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price', 'duration', 'start_date', 'end_date', 'status', 'user_id', 'payment_id', 'category', 'plan', 'price', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeExpired($query)
    {
        return $query->where('end_date', '<', now());
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopePrice($query, $price)
    {
        return $query->where('price', $price);
    }

    public function scopeDuration($query, $duration)
    {
        return $query->where('duration', $duration);
    }

    public function scopeStartDate($query, $startDate)
    {
        return $query->where('start_date', $startDate);
    }

    public function scopeEndDate($query, $endDate)
    {
        return $query->where('end_date', $endDate);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%'.$search.'%');
    }
}
