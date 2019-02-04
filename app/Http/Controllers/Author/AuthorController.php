<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class AuthorController extends Controller
{
    public function index(){
    	return view('customer.dashboard');
    }

    public function bookNow($id)
    {
        $room = Room::find($id);

        return view('customer.book', compact('room'));
    }
}
