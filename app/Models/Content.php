<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
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
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
