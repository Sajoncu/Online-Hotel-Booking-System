<?php

namespace App\Http\Controllers\Admin;
use App\Book;
use App\Checkout;
use App\Http\Controllers\Controller;
use App\Notifications\BookingApproved;
use App\Room;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('admin.booking.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    // approve pending post
    public function approval($id){
        $book = Book::find($id);
        if ($book->is_approve == false) {
            $book->is_approve = true;
            $book->save();

            //notify to author
            $book->user->notify(new BookingApproved($book));

            //Notify to subscriber
            // $subscribers = Subscriber::all();
            // foreach ($subscribers as $key => $subscriber) {
            //     Notification::route('mail', $subscriber->email)->notify(new NewPostNotifySubscriber($book));
            // }
            
            Toastr::success('Booking Approved Successfully', 'success');
        }

        return redirect()->back();
    }


    public function bookingCheckout(Request $request){
        //return $request;
        $date = date('d-m-Y');
        $room_id = $request->room_id;
        $price = $request->total_price;
        $checkout = new Checkout();

        $checkout->room_id = $room_id;
        $checkout->total_price  = $price;
        $checkout->checkoutdate = $date;
        $checkout->save();

        if (isset($request->book_id)) {
            $room = Room::find($request->room_id);
            $room->available = true;
            $room->save();
        }
        
        if (isset($request->room_id)) {
            $book = Book::find($request->book_id);
            //$book->delete();
        }


        Toastr::success('Checked out successfully :)','success');
        return view('admin.booking.allnewbooking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
