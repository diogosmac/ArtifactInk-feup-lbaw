<?php

namespace App\Policies;

use App\User;
use App\ProfilePicture;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePicturePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any profile pictures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the profile picture.
     *
     * @param  \App\User  $user
     * @param  \App\ProfilePicture  $profilePicture
     * @return mixed
     */
    public function view(User $user, ProfilePicture $profilePicture)
    {
        //
    }

    /**
     * Determine whether the user can create profile pictures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the profile picture.
     *
     * @param  \App\User  $user
     * @param  \App\ProfilePicture  $profilePicture
     * @return mixed
     */
    public function update(User $user, ProfilePicture $profilePicture)
    {
        //
    }

    /**
     * Determine whether the user can delete the profile picture.
     *
     * @param  \App\User  $user
     * @param  \App\ProfilePicture  $profilePicture
     * @return mixed
     */
    public function delete(User $user, ProfilePicture $profilePicture)
    {
        //
    }

    /**
     * Determine whether the user can restore the profile picture.
     *
     * @param  \App\User  $user
     * @param  \App\ProfilePicture  $profilePicture
     * @return mixed
     */
    public function restore(User $user, ProfilePicture $profilePicture)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profile picture.
     *
     * @param  \App\User  $user
     * @param  \App\ProfilePicture  $profilePicture
     * @return mixed
     */
    public function forceDelete(User $user, ProfilePicture $profilePicture)
    {
        //
    }
}
