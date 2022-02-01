<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\InstanceIdentifier;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as ModelsUser;

class User extends ModelsUser implements InstanceIdentifier
{
    use Notifiable;

    public function getInstanceIdentifier($options = null)
    {
        return $this->email;
    }

    /**
     * Get the unique identifier to load the Cart from
     *
     * @return int|string
     */
    public function getInstanceGlobalDiscount($options = null)
    {
        return $this->discountRate ?: 0;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'avatar', 'user_type_id', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relation Defintions

    public function seller(){

        return $this->hasOne(Seller::class);
        
    }

    // scope
    public function scopeUser($query){
        return $query->where('id', auth()->user()->id);
    }
}
