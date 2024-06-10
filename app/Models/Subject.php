<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable=[
        'video_id', 'teacher_id','class', 'link', 'date', 'status',
    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
