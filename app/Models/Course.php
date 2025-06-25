<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function content()
    {
        return $this->hasOne(Content::class);
    }
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

}
