@extends('layouts.app')
@section('title', '| Create')
@section('navsec')
   <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-10">
            <h1>Update Teacher</h1>
        </div>
        <?php if(Auth::user()->role==1){ ?>
            <div class="col-md-2 ">
                <a class="btn btn-secondary btn-block" href="{{ route('teacher.index') }}">
                    << See All Teachers</a>
            </div>
        <?php }elseif(Auth::user()->role==2){ ?>
            <div class="col-md-2 ">
                <a class="btn btn-secondary btn-block" href="{{ url('/') }}">
                    << Back</a>
            </div>
        <?php }?>

        <div class="col-md-8 mt-5">
            <form action="{{ route('teacher.update',$teacher->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="role" value="2">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$teacher->name}}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$teacher->email}}">
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{$teacher->address}}">
                </div>

                <div class="form-group">
                    <label for="">Age</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{$teacher->age}}">
                </div>

                <div class="form-group">
                    <label for="">Class</label>
                    <select required id="" class="form-control" name="class">
                        <option selected disabled>Select Class</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="number" name="contact" id="contact" class="form-control" value="{{$teacher->contact}}">
                </div>


                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>

                <div class="form-group">  {{-- <input type="submit" name="submit" value="Submit"  class=" btn btn-success btn-block" id=""> --}}
                    <button type="submit" class="btn btn-success" >Submit</button>
                    <a type="button" href="{{ route('teacher.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>

    </div>
    </div>
@endsection
