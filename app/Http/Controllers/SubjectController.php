<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Session;
use Validator;
use App\Models\User;
use App\Models\Teacher;
use App\Models\UserRole;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\jobs\SendEmailJob;

use Illuminate\Support\Facades\Hash;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd();
        $users=Auth::user()->id;
        $subjects = Subject::where('teacher_id',$users)->get();
        return view('subjects.index',compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

        'subjects' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('subjects/create')
                    ->withErrors($validator)
                    ->withInput();
    }
    $teacher_id =Auth::user()->id;
    $teacher_class=Auth::user()->class;
    // dd($teacher_id);
        $subject=  Subject::create([
            'teacher_id'=>$teacher_id,
            'subjects'=>$request->subjects,
            'teacher_class'=>$teacher_class,


        ]);
        //Display Flash Message
        Session::flash('success','The subject is Created successfully !');
        //redirecting to another page
        return redirect()->route('subjects.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('subjects.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subject::find($id);
        return view('subjects.edit',compact('subjects'));
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

            'subjects' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('subjects/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $teacher_id =Auth::user()->id;
        $teacher_class=Auth::user()->class;

                $subject=  Subject::find($id);
                $subject->subjects=  $request->subjects;
                $subject->teacher_id=  $teacher_id;
                $subject->teacher_class=  $teacher_class;
                $subject->save();
                //Display Flash Message
                Session::flash('success','The Subject is updated successfully !');
                //redirecting to another page
                return redirect()->route('subjects.show',$id);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Subject= Subject::find($id);
        $Subject->delete();
        return redirect()->route('subjects.index')
        ->with('success','Subject deleted successfully');
    }
}
