<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

    protected $fillable = ['name', 'user_id', 'status', 'photo_id'];


      // Relation Defintions

      public function user(){

        return $this->belongsTo(User::class);
        
    }
}
