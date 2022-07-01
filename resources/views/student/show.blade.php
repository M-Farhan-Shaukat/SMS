@extends('layouts.app')
@section('navsec')
@if (isset($student))
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                    <h1>{{ $student->name }}</h1>
                    <h3 class="lead">{{ $student->email }}</h3>
                    <h3 class="lead">Class :{{ $student->class }}</h3>
                    <h3 class="lead">Contact:{{ $student->contact }}</h3>
                    <h3 class="lead">Age:{{ $student->age }}</h3>
                    <h3 class="lead">Address:{{ $student->address }}</h3>
                    <hr>
            </div>
            <?php if(Auth::user()->role == 1){ ?>
                <div class="col-md-4 bg-light">
                    <div class="">

                        <dl class="dl-horizontal">
                        </dl>

                        <dl class="dl-horizontal">
                            <label><b>Created At : </b></label>
                            <p>{{ date('M j,Y h:ia', strtotime($student->created_at)) }}</p>
                        </dl>

                        <dl class="dl-horizontal">
                            <label><b>Last Updated : </b></label>
                            <p>{{ date('M j,Y h:ia', strtotime($student->updated_at)) }}</p>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-primary btn-block" href="{{ route('student.edit', $student->id) }}">Edit</a>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                data-target="#DeleteModal">
                                Delete
                            </button>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <a class="btn btn-secondary btn-block" href="{{ route('principle.index') }}">
                                    << Show All students</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="DeleteModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>Are You Sure ?</h1>
                            <strong>Delete This Record?</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <?php }elseif(Auth::user()->role == 3){?>
                    <div class="col-md-4 bg-light">
                        <div class="">

                            <dl class="dl-horizontal">
                            </dl>

                            <dl class="dl-horizontal">
                                <label><b>Created At : </b></label>
                                <p>{{ date('M j,Y h:ia', strtotime($student->created_at)) }}</p>
                            </dl>

                            <dl class="dl-horizontal">
                                <label><b>Last Updated : </b></label>
                                <p>{{ date('M j,Y h:ia', strtotime($student->updated_at)) }}</p>
                            </dl>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-primary btn-block" href="{{ route('student.edit', $student->id) }}">Edit</a>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <a class="btn btn-secondary btn-block" href="{{ url('/') }}">
                                        << Show All students</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
        </div>
    </div>
    @endif
@endsection
