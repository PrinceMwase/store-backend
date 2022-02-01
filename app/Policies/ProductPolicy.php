<?php

namespace App\Policies;

use App\Product;
use App\Store;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        return $user->status == 'active' ? Response::allow()  
            : Response::deny('This account has been diactivated, Please Contact the Adminstrator');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user)
    {
        //
      
        return $user->status == 'active' ? Response::allow()  
        : Response::deny('This account has been diactivated, Please Contact the Adminstrator');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->role->name == 'Seller'
                ? Response::allow()  
                : Response::deny('Forbidden, you are using ' . $user->role->name . " account "); 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        //
        return $user->seller->id === $product->store->seller->id 
                ? Response::allow()  
                : Response::deny('You do not own this Product.'); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        //
        return $user->seller->id === $product->store->seller->id  
                ? Response::allow()  
                : Response::deny('You do not own this Product.'); 
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
