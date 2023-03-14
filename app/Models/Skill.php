<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'curricula_id',
    ];

    public function curricula()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
