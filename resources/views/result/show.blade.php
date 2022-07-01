@extends('layouts.app')
@section('navsec')
{{-- @php
    foreach ($students as $student) {
        foreach ($student->result as $result) {
            dd();
    }}
@endphp --}}

@foreach ($students as $student)
@endforeach





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

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Total Marks</th>
                                    <th>Obtained Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->result as $result)

                                <tr>
                                    <td>{{ $result->subject->subjects }}</td>
                                    <td>{{ $result->total_marks }}</td>
                                    <td>{{ $result->marks }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>


            </div>


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
                            <a class="btn btn-success btn-block"
                                href="{{ route('result.create', $student->id) }}">Create</a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-secondary btn-block" href="{{ url('/') }}">Back</a>
                        </div>
@if ($student->result->count()!=0)


                            <div class="col-sm-6 mt-2">
                                <a class="btn btn-primary btn-block"
                                    href="{{ route('result.edit', $student->id) }}">Edit</a>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                    data-target="#DeleteModal">
                                    Delete
                                </button>
                                @endif

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
                    <form action="{{ route('result.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">Delete Result</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
