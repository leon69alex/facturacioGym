<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //COMPROVEM QUE EL ID DE LA RUTA QUE DEMANEM ÉS EL MATEIX ID QUE DEL USUARI IDENTIFICAT.
    //EL PRIMER PARAMETRE ÉS EL ID DEL USUARI IDENTIFICAT(LARAVEL EL PASSA AUTOMÀTICAMENT).
    public function edit(User $authUser, User $user)
    {
        //dd($authUser);
        return $authUser->id === $user->id;
    }
}
