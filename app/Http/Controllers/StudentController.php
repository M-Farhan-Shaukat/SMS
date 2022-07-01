<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Session;
use Validator;
use App\Models\User;
use App\Models\Student;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\jobs\SendEmailJob;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('role',3)->get();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $stu= UserRole::Students;
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'contact'=>'required|max:12|min:11',
            'age'=>'required',
            'address'=>'required',
            'class'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('student/create')
                        ->withErrors($validator)
                        ->withInput();
        }
            $student=  User::create([
                'id'=>Str::uuid(),
                'name'=>$request->name,
                'email'=>$request->email,
                'username' => str_slug($request->name , "-"),
                'address'=>$request->address,
                'age'=>$request->age,
                'class'=>$request->class,
                'contact'=>$request->contact,
                'password'=>Hash::make('student@123'),
                'role'=>UserRole::where('role',$stu)->first()->id,
            ]);
            $teacher= User::where('role',2)->get();
            $details['email'] = $request->email;
            $student['student'] = $student;
            $roletype['roletype']=UserRole::where('role',$stu)->first()->role;
            $roletype = 1;
            dispatch(new SendEmailJob($details,$student,$roletype));
            //Display Flash Message
            Session::flash('success','The student is Created successfully !');
            //redirecting to another page
            return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::find($id);
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    // for edit student
    public function edit($id)
    {
        $student = User::find($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'contact'=>'required|max:12|min:11',
            'age'=>'required',
            'address'=>'required',
            'class'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('student/edit')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            $student=  User::find($id);
            $student->name=  $request->name;
            $student->email=  $request->email;
            $student->address=  $request->address;
            $student->age=  $request->age;
            $student->class=  $request->class;
            $student->contact=  $request->contact;
            if(!empty($request->password)){
                $student->password=  $request->password;
            }
            $student->save();
            //Display Flash Message
            Session::flash('success','The student is updated successfully !');
            //redirecting to another page
            return redirect()->route('teacher.show',$id);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student= User::find($id);
        $student->delete();
        return redirect('/')
        ->with('success','Student deleted successfully');
    }
}
