<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //


    /**
     * catefory relation definition
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
