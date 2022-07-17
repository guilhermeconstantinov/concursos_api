<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'wording',
        'alternative',
        'correct_alternative',
        'topic_id',
    ];

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
