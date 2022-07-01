<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Result;
use Auth;
use Validator;
use Session;
use App\Models\Subject;
use App\Models\User;

class ResultController extends Controller
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
    public function create($id)
    {
        $stu_id = $id;
        $subjects = Subject::where('teacher_id',Auth::user()->id)->get();
        return view('result.create',compact('subjects','stu_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            foreach($request->result as $row):
            $result= Result::create([
                'student_id'=>$request->student_id,
                'subject_id'=>$row['subject_id'],
                'total_marks'=>$row['total_marks'],
                'marks'=>$row['marks'],
            ]);
            endforeach;
        //Display Flash Message
        Session::flash('success','The Result is Created successfully !');
        //redirecting to another page
        return redirect()->route('result.show',$request->student_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = User::where('id',$id)->with('result.Subject')->get();
        return view('result.show',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stu_id = $id;
        $subjects = Subject::where('teacher_id',Auth::user()->id)->get();
        $result = User::find($id)->result;
        return view('result.edit',compact('result','subjects','stu_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $result = Result::where('student_id',$request->student_id)->get();
        $result->each->delete();
            foreach($request->result as $row):
                $result= Result::create([
                    'student_id'=>$request->student_id,
                    'subject_id'=>$row['subject_id'],
                    'total_marks'=>$row['total_marks'],
                    'marks'=>$row['marks'],
                ]);
            endforeach;
           //Display Flash Message
        Session::flash('success','The Result is Updated successfully !');
        //redirecting to another page
        return redirect()->route('result.show',$request->student_id);


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::where('student_id',$id)->get();
        $result->each->delete();
        //Display Flash Message
        Session::flash('success','The Result is Deleted successfully !');
        //redirecting to another page
        return redirect()->route('result.show',$id);

    }
}
