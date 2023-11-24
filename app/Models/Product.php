<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',

    ];

    protected $casts = [
        'images' => 'array',

    ];


    // public function stock(){
    //     return $this->hasOne(Stock::class);
    // }
    


    /**
     * The categories that belong to the Product
     *
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The sizes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }


}
