<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    
    protected $fillable = ["customer_id", "product_id"];

    //relationships
    
    public function customer(){
        return $this->hasMany(Customer::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
