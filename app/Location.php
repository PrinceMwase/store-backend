<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //Relationship

    public function sublocation( )
    {
        return $this->hasMany(SubLocation::class);
    }

}
