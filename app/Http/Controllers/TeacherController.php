<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use Validator;
use App\Models\User;
use App\Models\Teacher;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\jobs\SendEmailJob;

use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('role',2)->get();
        return view('teacher.index',compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teach= UserRole::Teachers;

        $validator = Validator::make($request->all(), [

        'name' => 'required|max:255',
        'contact'=>'required|max:12|min:11',
        'age'=>'required',
        'address'=>'required',
        'class'=>'required'
    ]);
    if ($validator->fails()) {
        return redirect('teacher/create')
                    ->withErrors($validator)
                    ->withInput();
    }
        $teacher=  User::create([
            'id'=>Str::uuid(),
            'name'=>$request->name,
            'email'=>$request->email,
            'username' => str_slug($request->name , "-"),
            'address'=>$request->address,
            'age'=>$request->age,
            'class'=>$request->class,
            'contact'=>$request->contact,
            'password'=>Hash::make('teacher@123'),
            'role'=>UserRole::where('role',$teach)->first()->id,

        ]);
        $details['email'] = $request->email;
        $teacher['teacher'] = $teacher;
        $roletype['roletype']=UserRole::where('role',$teach)->first()->role;
        $roletype = 0;

        dispatch(new SendEmailJob($details,$teacher,$roletype));
        //Display Flash Message
        Session::flash('success','The Teacher is Created successfully !');
        //redirecting to another page
        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = User::find($id);
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::find($id);
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
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
                return redirect('teacher/edit')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                $teacher=  User::find($id);

                $teacher->name=  $request->name;
                $teacher->email=  $request->email;
                $teacher->address=  $request->address;
                $teacher->age=  $request->age;
                $teacher->class=  $request->class;
                $teacher->contact=  $request->contact;
                if(!empty($request->password)){
                $teacher->password=  $request->password;
                }
                $teacher->role=  $request->role;
                $teacher->save();
                //Display Flash Message
                Session::flash('success','The Teacher is updated successfully !');
                //redirecting to another page
                return redirect()->route('teacher.show',$id);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher= User::find($id);
        $teacher->delete();
        return redirect('/')
        ->with('success','Class deleted successfully');
    }
}
