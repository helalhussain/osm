<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
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

}
