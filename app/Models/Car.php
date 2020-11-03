<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    protected $fillable = [
        'name', 'year', 'slug', 'exchange', 'fuel', 'image', 'category_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
