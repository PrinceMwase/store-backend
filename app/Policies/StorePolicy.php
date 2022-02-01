<?php

namespace App\Policies;

use App\Store;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class StorePolicy
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
     * @param  \App\Store  $store
     * @return mixed
     */
    public function view(User $user, Store $store)
    {
        //
        return $user->seller->id == $store->seller->id ? Response::allow()  
        : Response::deny('You do not have view to Update this Store');
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
        return $user->role->name == 'Seller' ? Response::allow()  
        : Response::deny('This is account type is not authorised');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function update(User $user, Store $store)
    {
        //
        return $user->seller->id == $store->seller->id ? Response::allow()  
        : Response::deny('You do not have permission to Update this Store');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function delete(User $user, Store $store)
    {
        //
        return $user->seller->id == $store->seller->id ? Response::allow()  
        : Response::deny('This is account type is not authorised');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function restore(User $user, Store $store)
    {
        //
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Store  $store
     * @return mixed
     */
    public function forceDelete(User $user, Store $store)
    {
        //
    }
}
