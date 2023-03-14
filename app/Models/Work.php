<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'company',
        'description',
        'start_date',
        'end_date',
        'curricula_id',

    ];

    public function curricula()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
