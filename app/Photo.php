<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    //
    protected $fillable = ['photo', 'thumbnail'];

    //scoped
    public function scopeOwned($query){
        return $query->where('user_id' ,  auth()->user()->id);
    }
   
}
