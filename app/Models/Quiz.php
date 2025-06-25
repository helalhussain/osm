<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
