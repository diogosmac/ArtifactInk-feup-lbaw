<?php

namespace App\Policies;

use App\User;
use App\ItemPicture;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPicturePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any item pictures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the item picture.
     *
     * @param  \App\User  $user
     * @param  \App\ItemPicture  $itemPicture
     * @return mixed
     */
    public function view(User $user, ItemPicture $itemPicture)
    {
        //
    }

    /**
     * Determine whether the user can create item pictures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the item picture.
     *
     * @param  \App\User  $user
     * @param  \App\ItemPicture  $itemPicture
     * @return mixed
     */
    public function update(User $user, ItemPicture $itemPicture)
    {
        //
    }

    /**
     * Determine whether the user can delete the item picture.
     *
     * @param  \App\User  $user
     * @param  \App\ItemPicture  $itemPicture
     * @return mixed
     */
    public function delete(User $user, ItemPicture $itemPicture)
    {
        //
    }

    /**
     * Determine whether the user can restore the item picture.
     *
     * @param  \App\User  $user
     * @param  \App\ItemPicture  $itemPicture
     * @return mixed
     */
    public function restore(User $user, ItemPicture $itemPicture)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the item picture.
     *
     * @param  \App\User  $user
     * @param  \App\ItemPicture  $itemPicture
     * @return mixed
     */
    public function forceDelete(User $user, ItemPicture $itemPicture)
    {
        //
    }
}
