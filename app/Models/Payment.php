<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'method', 'gateway', 'reference', 'transaction_code', 'amount', 'status', 'method', 'paid_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function paymentDetails()
    {
        return $this->hasOne(PaymentDetail::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('reference', 'like', '%'.$search.'%');
    }

    public function scopeMethod($query, $method)
    {
        return $query->where('method', $method);
    }

    public function scopeGateway($query, $gateway)
    {
        return $query->where('gateway', $gateway);
    }

    public function scopeAmount($query, $amount)
    {
        return $query->where('amount', $amount);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopePaidAt($query, $paid_at)
    {
        return $query->where('paid_at', $paid_at);
    }
}
