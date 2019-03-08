<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
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
        $rooms = Room::all();
        return view('welcome', compact('rooms'));
    }

    public function contactUs(){
        return view('contact-us');
    }

    public function abouttUs(){
        return view('about-us');
    }
}
