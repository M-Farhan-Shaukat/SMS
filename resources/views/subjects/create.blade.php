@extends('layouts.app')
@section('title', '| Create')
@section('navsec')
   <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-10">
            <h1>Create New Teacher</h1>
        </div>
        <div class="col-md-2 ">
            <a class="btn btn-secondary btn-block" href="{{ route('subjects.index') }}">
                << See All Subjects</a>
        </div>
        <div class="col-md-8 mt-5">
            <form action="{{ route('subjects.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Subject Name</label>
                    <input type="text" name="subjects" id="subjects" class="form-control" placeholder="Enter Subjects's Name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" >Submit</button>
                    <a type="button" href="{{ route('subjects.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>

    </div>
    </div>
@endsection
