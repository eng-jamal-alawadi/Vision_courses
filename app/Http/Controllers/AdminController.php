<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function index(){
            $users_count = User::count();
            $registrations_count = Registration::count();
            $courses_count = Course::count();


            return view('admin.index',compact('users_count','registrations_count','courses_count'));
        }


}
