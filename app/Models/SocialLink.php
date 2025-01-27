<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_id', 'platform', 'url'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
