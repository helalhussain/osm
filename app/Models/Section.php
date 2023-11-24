<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public function cls()
    {
        return $this->belongsToMany(Cls::class,'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
