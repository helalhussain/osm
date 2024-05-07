<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }
    public function notice()
    {
        return $this->hasOne(Notice::class);
    }
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
    public function content()
    {
        return $this->hasOne(Content::class);
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }
    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
