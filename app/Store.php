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
    
    public function seller(){
      return $this->belongsTo(Seller::class);    
    }

    public function photo(){
      return $this->belongsTo(Photo::class);
    }

    public function description(){
      return $this->morphOne(Description::class, 'describable');
    }

    public function products(){
      return $this->hasMany( Product::class );
    }

    // scope
    public function scopeActive($query)
    {
      return $query->where('status', 'active');
    }

    public function scopeOwned($query){
      $stores = User::find ( auth()->user()->id )->seller->store->modelKeys();
      return $query->whereIntegerInRaw('id' ,  $stores);
    }



}
