<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;


    protected $fillable = [
        'code',
        'name',
        'flag',
    ];

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}
