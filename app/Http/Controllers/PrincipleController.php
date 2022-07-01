<?php

namespace App\Http\Controllers;

use App\Models\Principle;
use App\Models\User;
use Illuminate\Http\Request;

class PrincipleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teachers= User::where('role',2)->get();
        $students= User::where('role',3)->get();
        return view('principle.index',compact('teachers','students'));
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
     * @param  \App\Principle  $principle
     * @return \Illuminate\Http\Response
     */
    public function show(Principle $principle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Principle  $principle
     * @return \Illuminate\Http\Response
     */
    public function edit(Principle $principle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Principle  $principle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Principle $principle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Principle  $principle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Principle $principle)
    {
        //
    }
}
