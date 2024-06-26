<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'banner',
        'avatar',
        'phone',
        'title',
        'city',
        'region_id',
        'country',
        'about_me',
        'social',
        'education',
        'price_per_hour',
        'banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion uno a muchos inversa con la tabla regions
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    // Relacion uno a muchos con la tabla reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Relacion uno a muchos con la tabla teachers_subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects');
    }
}
