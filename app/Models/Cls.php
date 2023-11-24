<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cls extends Model
{
    use HasFactory;

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
}
