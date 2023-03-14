<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'bio',
        'picture',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function work()
    {
        return $this->hasMany(Work::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function language()
    {
        return $this->hasMany(Language::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
}
