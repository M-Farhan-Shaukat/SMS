@extends('layouts.app')
@section('title', '| Create')
@section('navsec')
   <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-10">
            <h1>Update Teacher</h1>
        </div>


            <div class="col-md-2 ">
                <a class="btn btn-secondary btn-block" href="{{ route('subjects.index') }}">
                    << Back</a>
            </div>
        <div class="col-md-8 mt-5">
            <form action="{{ route('subjects.update',$subjects->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" name="subjects" id="subjects" class="form-control" value="{{$subjects->subjects}}">
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
