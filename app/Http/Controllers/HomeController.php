<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userRole;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 1){
            $c_teacher = User::where('role',2)->whereDate('created_at', Carbon::today())->get();
            $c_student = User::where('role',3)->whereDate('created_at', Carbon::today())->get();
            $teachers = User::where('role',2)->get();
            $students = User::where('role',3)->get();
            return view('admin.dashboard',compact('teachers','students','c_teacher','c_student'));
        }
        elseif(Auth::user()->role == 2){
            $students = User::where('class',Auth::user()->class)->where('role',3)->get();
            return view('teacher.dashboard',compact('students'));
        }
        elseif(Auth::user()->role == 3){
            $id = Auth::user()->id;

        $students = User::where('id',$id)->first();
        $student = User::find($id);
        $results = $student->result;
        // dd($id);
        // $results =User::find($id)->result;
        //     $students = User::where('class',Auth::user()->class)->where('role',3)->get();
            return view('student.dashboard',compact('students','results'));
        }
    }
}
