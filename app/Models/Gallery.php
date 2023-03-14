<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture',
        'title',
        'curricula_id',
        ];

    public function curricula()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
