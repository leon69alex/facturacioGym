<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends \TCG\Voyager\Models\Role
{

    //protected $table = 'roles';


    public function user()
    {
        return $this->hasMany(User::class);

    }
}
