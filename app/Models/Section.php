<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public function cls()
    // {
    //     return $this->belongsToMany(Cls::class,'id');
    // }


    public function course()
    {
        return $this->hasOne(Course::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }


}
