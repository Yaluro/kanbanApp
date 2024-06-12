<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given contact message can be viewed by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $Contact
     * @return bool
     */
    public function viewAny(User $user)
    {
        // Only admin can view contact messages
        return $user->role && $user->role->name === 'admin';
    }

    /**
     * Determine if the given contact message can be deleted by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contact  $Contact
     * @return bool
     */
    public function delete(User $user, Contact $Contact)
    {
        // Only admin can delete contact messages
        return $user->role && $user->role->name === 'admin';
    }
}