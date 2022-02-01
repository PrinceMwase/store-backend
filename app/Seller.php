<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //relationsship
    protected $table = "sellers";

    public function store() {
        return $this->hasMany(Store::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // scope
    public function scopeSeller($query){
      return $query->where('id' ,  User::find ( auth()->user()->id )->seller->id);
    }
}
