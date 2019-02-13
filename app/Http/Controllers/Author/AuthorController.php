<?php

namespace App\Http\Controllers\Author;

use App\Book;
use App\Http\Controllers\Controller;
use App\Notifications\BookingAproveToAdmin;
use App\Room;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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

    public function bookingRoom(Request $request){
    	//return $request;
    	$this->validate($request,[
    		'arrival_date' => 'required',
    		'departure_date' => 'required',
    		'room_number' => 'required',
    		'guest' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required|numeric',
    		'note' => 'required',
    	]);

        $room = Room::find($request->room_id);
    	$book = new Book();
    	$book->user_id = Auth::user()->id;
    	$book->room_number = $request->room_number;
    	$book->guest = $request->guest;
    	$book->arrival_date = $request->arrival_date;
    	$book->departure_date = $request->departure_date;
    	$book->email = $request->email;
    	$book->phone = $request->phone;
    	$book->note = $request->note;
        $book->is_approve = false;
        if ($room->available == true) {
            $room->available = false;
            $room->save();
        }
    	$book->save();

    	//send notification to the admin
    	$users = User::where('role_id', '1')->get();
    	Notification::send($users, new BookingAproveToAdmin($book));

    	Toastr::success('Booked Successfully','Success');
    	return redirect()->back();
    }
}
