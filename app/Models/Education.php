<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'university',
        'level',
        'feild',
        'start_date',
        'end_date',
        'curriculum_id',

    ];

    public function curricula()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
