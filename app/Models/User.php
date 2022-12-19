<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function freind()
    {
        return $this->belongsTo(Freind::class);
    }


    public function sender()
    {
        return $this->belongsToMany(User::class,'requests');
    }


    
    public function receiver()
    {
        return $this->belongsToMany(User::class,'requests');
    }

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function link()
    {
        return $this->hasMany(Link::class);
    }
}
