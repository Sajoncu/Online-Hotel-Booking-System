<?php

namespace App\Http\Controllers\Admin;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
    	return view('admin.dashboard');
    }

    public function allNewBooking(){
    	$books = Book::all();
    	return view('admin.booking.allnewbooking',compact('books'));
    }
}
