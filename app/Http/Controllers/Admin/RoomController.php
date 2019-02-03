<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Notifications\AuthorPostApproved;
use App\Notifications\NewPostNotifySubscriber;
use App\Room;
use App\Subscriber;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        //store the data
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'price'=>'required',
            'image'=>'required',
            'area'=>'required',
            'guest'=>'required',
            'room_number'=>'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        if ($image) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check category dir is exist
            if (!Storage::disk('public')->exists('rooms')) {
                Storage::disk('public')->makeDirectory('rooms');
            }

            //resize image for category and upload
            $postimage = Image::make($image)->resize(754, 543)->stream();
            Storage::disk('public')->put('rooms/'.$imagename, $postimage);

        }else{
            $imagename = 'default.png';
        }

        $post = new Room();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->price = $request->price;
        $post->body = $request->body;
        $post->slug = $slug;
        $post->guest = $request->guest;
        $post->area = $request->area;
        $post->room_number = $request->room_number;
        $post->image = $imagename;
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();
        // $post->categories()->attach($request->categories);
        // $post->tags()->attach($request->tags);
        //Notify to subscriber
        ///$subscribers = Subscriber::all();
        // foreach ($subscribers as $key => $subscriber) {
        //     Notification::route('mail', $subscriber->email)->notify(new NewPostNotifySubscriber($post));
        // }
        Toastr::success('Post Added Successfully','Success');
        return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        return view('admin.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $room = Room::find($id);
        return view('admin.room.editpost', compact('room'));    
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
        //update the data
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'price'=>'required',
            'area'=>'required',
            'guest'=>'required',
            'room_number'=>'required',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        $post = Room::find($id);
        if ($image) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check category dir is exist
            if (!Storage::disk('public')->exists('rooms')) {
                Storage::disk('public')->makeDirectory('rooms');
            }


            //delete old post image
            if(Storage::disk('public')->exists('rooms/'.$post->image)){
                Storage::disk('public')->delete('rooms/'.$post->image);
            }

            //resize image for category and upload
            $postimage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('rooms/'.$imagename, $postimage);

        }else{
            $imagename = $post->image;
        }

        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $slug;
        $post->guest = $request->guest;
        $post->area = $request->area;
        $post->room_number = $request->room_number;
        $post->image = $imagename;
        if (isset($request->status)) {
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;

        $post->save();

        Toastr::success('Room Edited Successfully','Success');
        return redirect()->route('admin.room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if (Storage::disk('public')->exists('rooms/'.$room->image)) {
            Storage::disk('public')->delete('rooms/'.$room->image);
        }

        $room->delete();
        Toastr::success('Post Successfully Deleted','success');
        return redirect()->back();
    }
}
