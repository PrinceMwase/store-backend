<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // mass assignments
    protected $fillable = ['name', 'price'];

    // category relationship definitions
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function description(){
        return $this->morphOne(Description::class, 'describable');
    }

}
