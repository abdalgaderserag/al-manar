<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id', 'subjects', 'score', 'type', 'class', 'year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getResultAttribute()
    {
        $result = $this->score;
        return $result;
    }

}
