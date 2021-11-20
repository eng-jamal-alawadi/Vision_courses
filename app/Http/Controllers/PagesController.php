<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Mail\contactMail;
use App\Models\Registration;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isNull;

class PagesController extends Controller
{

    public function index(){
        $courses = Course::all();
        return view('front.index',compact('courses'));
    }

    public function search(Request $request){
        $courses = Course::where('name','like','%'. $request->searchField . '%')->orWhere('content' , 'like' , '%' .$request->searchField.'%')->get();
        return view('front.index',compact('courses'));
    }

    public function course($slug){

        $course = Course::where('slug',$slug)->first();
        return view('front.course',compact('course'));
    }

    public function courseRegister($slug){
        $course = Course::where('slug',$slug)->first();
        return view('front.register',compact('course'));
    }

    public function registerSubmit(Request $request,$slug){

        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $course = Course::where('slug',$slug)->select('id')->first();
        $user = User::where('email',$request->email)->first();

        if(is_null($user)){
            //create new user
           $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
           ]);
        }

        $register = Registration::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        return redirect()->route('pay',$register->id);
    }

    public function pay($id){
        $register=Registration::find($id);
        return view('front.pay',compact('register'));
    }

    public function thanks($id){
        Registration::find($id)->update([
            'status' => 1
        ]);

        return redirect()->route('homepage');
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactSubmit(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to('admin@example.com')->send(new contactMail($request->except('$_token')));

        return redirect()->route('contact')->with('success','Message send succesessfuly');


    }
}
