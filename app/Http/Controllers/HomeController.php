<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = array_diff(scandir('storage/images/slider'), array('..', '.'));;

        return view('home', compact('images'));
    }

    public function instalacions()
    {
        $images = array_diff(scandir('storage/images/instalacions'), array('..', '.'));;

        return view('instalacions', compact('images'));
    }

    public function contacta()
    {
        return view('contacta');
    }
}
