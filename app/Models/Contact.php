<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'email',
        'location',
        'curriculum_id',

    ];

    public function curricula()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
