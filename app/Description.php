<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{

    protected $fillable = ['description'];
    //RelationShip Definition
    
    public function describable(){
        return $this->morphTo();
    }
}
