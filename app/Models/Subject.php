<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'classroom_id',
        'name',
        'code',
        'fee',
        'discount',
        'status'
    ];


    public function notice()
    {
        return $this->hasOne(Notice::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
