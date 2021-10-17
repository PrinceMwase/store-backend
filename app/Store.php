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

    public function photo(){
      return $this->belongsTo(Photo::class);
    }

    public function description(){
      return $this->morphOne(Description::class, 'describable');
    }

    // scope
    public function scopeActive($query)
    {
      return $query->where('status', 'active');
    }



}
