@extends('layouts.app')
@section('navsec')
    @if (isset($subject))
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8">


                    <h1>{{ $subject->subjects }}</h1>
                    <h3 class="lead">Class :{{ $subject->teacher_class }}</h3>
                    <hr>
                </div>

                <div class="col-md-4 bg-light">
                    <div class="">

                        <dl class="dl-horizontal">
                        </dl>

                        <dl class="dl-horizontal">
                            <label><b>Created At : </b></label>
                            <p>{{ date('M j,Y h:ia', strtotime($subject->created_at)) }}</p>
                        </dl>

                        <dl class="dl-horizontal">
                            <label><b>Last Updated : </b></label>
                            <p>{{ date('M j,Y h:ia', strtotime($subject->updated_at)) }}</p>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-primary btn-block"
                                    href="{{ route('subjects.edit', $subject->id) }}">Edit</a>
                            </div>
                            <div class="col-sm-6">

                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                data-target="#DeleteModal">
                                Delete
                            </button>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <a class="btn btn-secondary btn-block" href="{{ route('subjects.index') }}">
                                    << Show All subjects</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel"></h5>
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
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
