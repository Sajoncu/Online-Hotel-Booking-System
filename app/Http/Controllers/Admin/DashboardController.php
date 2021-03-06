<?php

namespace App\Http\Controllers\Admin;
use App\Book;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function index(){
    	return view('admin.dashboard');
    }

    public function allNewBooking(){
    	$books = Book::all();
    	return view('admin.booking.allnewbooking',compact('books'));
    }

    public function profile(){
    	return view('admin.profile');
    }

    public function updateProfileData(Request $request){
    {
            $this->validate($request,[
                'name'=>'required',
                'skype'=>'required',
                'phone'=>'required',
                'email'=>'required|email',
            ]);

            $image = $request->file('image');
            $slug = str_slug($request->name);
            $user = User::find(Auth::user()->id);

            if (isset($image))
            {
                $dateTime = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$dateTime.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('admin'))
                {
                    Storage::disk('public')->makeDirectory('admin');
                }

                if (Storage::disk('public')->exists('admin/'.$user->image)) 
                {
                    Storage::disk('public')->delete('admin/'.$user->image);
                }

                $profileImage = Image::make($image)->resize(332, 397)->save($imageName);
                Storage::disk('public')->put('admin/'.$imageName, $profileImage);
            }
            else
            {
                $imageName = $user->image;
            }

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->skype = $request->skype;
            $user->email = $request->email;
            $user->image = $imageName;
            $user->save();

            Toastr::success('Profile Updated Successfully!!!', 'success');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) 
        {
            
            if (!Hash::check($request->password, $hashedPassword)) 
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed.', 'success');
                Auth::logout();
                return view('login');
            }
            else
            {
                Toastr::error('You entered and old password.', 'error');
                return redirect()->back();
            }
        }
        else
        {
            Toastr::error('Please Enter a valid password.', 'error');
            return redirect()->back();
        }
    }
}
