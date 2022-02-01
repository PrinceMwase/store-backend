<?php

namespace App;
use Gloudemans\Shoppingcart\CanBeBought;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Buyable
{
    

    use SoftDeletes;
    protected $dates = ['deleted_at'];

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

    public function photos(){
        return $this->hasMany(ProductPhoto::class);
    }
    

    public function description(){
        return $this->morphOne(Description::class, 'describable');
    }
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }
    public function getBuyableWeight($options = null)
    {
        return 1;
    }
    public function scopeOwned($query){
        $stores = User::find ( auth()->user()->id )->seller->store->modelKeys();
        return $query->whereIntegerInRaw('store_id' ,  $stores);
    }


}
