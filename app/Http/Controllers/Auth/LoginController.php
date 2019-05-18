<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Socialite;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
    * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToGoogle()
    {
        //dd($request->all());
        return Socialite::driver('google')->redirect();
    }

     /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        //dd($request->all());
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        // only allow people with @company.com to login
        //if(explode("@", $user->email)[1] !== 'company.com'){
        //    return redirect()->to('/');
        //}
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {

            // create a new user
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            //$newUser->google_id = $user->id;
            $newUser->avatar = $user->avatar;
            //$newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }

    //OAUTH WITH GITHUB

    /**
    * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToGithub()
    {
        //dd($request->all());
        return Socialite::driver('github')->redirect();
    }

     /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGithubCallback()
    {
        //dd($request->all());
        try {
            $user = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect()->back();
        }
        // only allow people with @company.com to login
        //if(explode("@", $user->email)[1] !== 'company.com'){
        //    return redirect()->to('/');
        //}
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {

            //dd($user);
            // create a new user
            $newUser = new User;
            $newUser->name = $user->nickname;
            $newUser->email = $user->email;
            $newUser->avatar = $user->avatar;
            //$newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->back();
    }
}
