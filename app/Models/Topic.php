<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discipline_id'
    ];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id');
    }

    /* public function question()
    {
        return $this->belongsTo(Questions::class);
    } */
}
