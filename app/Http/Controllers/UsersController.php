<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

use Storage;

class UsersController extends Controller
{
    function __construct()
    {
        //COMPROVA SI L'USUARI ESTA AUTENTIFICAT
        //$this->middleware('auth', ['except' => ['show']]);
        //COMPROVA ELS ROLS
        $this->middleware('roles:admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        //HO COMPROVA EL POLICY UserPolicy
        $this->authorize('edit', $user);

        return view('users.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $info = 'Perfil actualitzat correctament. ';

        $user = User::findOrFail($id);

        $this->authorize('edit', $user);

        $user->name = $request->name;
        $user->surnames = $request->surnames;

        if($request->avatar != null){

            $this->validate($request, [
                'avatar' => 'mimes:jpeg,png,bmp,tiff |max:4096',
            ],
                $messages = [
                    'required' => 'The :attribute field is required.',
                    'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
                ]
            );

            $path = $request->file('avatar')->store(
                'users/avatars', 'avatar'
            );

            $user->avatar = $path;
        }

        if($user->email != $request->email){

            if($request->password == null){
                $info .= 'El teu email no es pot canviar ja que t\'autenfiques des de una aplicació externa. ';
            } else {
                $user->email = $request->email;
                $user->email_verified_at = null;
                $info .= 'Com has canviat el email, l\'hauras de tornar a confirmar. ';
            }
            
        }

        if($request->password != null){
            if($user->password == null){
                $info .= 'La teva contrasenya no es pot actualitzar ja que t\'autenfiques des de una aplicació externa. ';
            } else {
                $user->password = bcrypt($request->password);
            }
        }

        $user->save();

        return redirect()->back()->with('info', $info);
    }
}
