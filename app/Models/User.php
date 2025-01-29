<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\SendEmailOtpNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'company_id',
        'skills',
        'about',
        'language',
        'designation',
        'profile_image',
        'remember_token',
        'email_verified_at',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'whatsapp_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0] ?? $this->name;
    }

    /**
     * Check if the user has that particular role.
     *
     * @param string $role
     * @return void
     */
    public function hasRole(string $role)
    {
        return $this->roles->contains(function ($r) use ($role) {
            return $r->slug === $role || $r->name === $role;
        });
    }

    public function permissions()
    {
        return
            $this->roles()->with('permissions')->get()
                ->pluck('permissions')
                ->flatten()
                ->unique('id');
    }

    public function hasPermission(string|Permission $permission): mixed
    {

        if (is_string($permission)) {
            return $this->permissions()->contains('name', $permission) || $this->permissions()->contains('slug', $permission);
        }

        return $this->permissions()->contains('name', $permission->name) || $this->permissions()->contains('slug', $permission->slug);
    }


    protected static function booted()
    {

        static::created(function ($record) {

            try {
                $otp = random_int(100000, 999999);

                if (Cache::has('otp_' . $record->email)) {
                    Cache::forget('otp_' . $record->email);
                }

                Cache::put('otp_' . $record->email, $otp, now()->addMinutes(10));

                $record->notify(new SendEmailOtpNotification($otp));
                Notification::make()
                    ->title('Check your email for verification')
                    ->success()
                    ->send();
            } catch (\Throwable $th) {
                Log::alert("Error sending OTP to user: {$record->email}, Error: {$th->getMessage()}");
            }
        });
    }

    public function getNameInitialsAttribute()
    {
        $nameParts = explode(' ', $this->name);
        $initials = '';

        foreach ($nameParts as $part) {
            if (!empty($part)) {
                $initials .= strtoupper(substr($part, 0, 1));
            }
        }

        return $initials ?: strtoupper(substr($this->name, 0, 2));
    }


}
