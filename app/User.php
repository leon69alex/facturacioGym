<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends \TCG\Voyager\Models\User implements MustVerifyEmail  
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //FEM UNA "CLAU FORANA".
    public function role()
    {
        //dd($this->belongsTo(Role::class));
        //RELACIO 1 A 1
        return $this->belongsTo(Role::class);

        //RELACIO MOLTS A MOLTS
        //return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function hasRoles($roles){
        //dd($roles);
        //"pluck" RETORNA UN ARRAY AMB LA CLAU QUE LI PASSEM.
        //"intersect" COMPARA DOS ARRAYS I RETORNA LES COINCIDENCIES
        //dd($this->role);
        //dd($this->role()->pluck('name')->intersect($roles));
        return $this->role()->pluck('name')->intersect($roles)->count();

        /* foreach ($roles as $role) {

            foreach($this->roles as $userRole)
            {
                if($userRole->name === $role){
                
                    return true;
                } 
            }   
        }
        return false; */
    }
}
