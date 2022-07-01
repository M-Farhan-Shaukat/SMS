@extends('layouts.app')
<style>
    svg {
    overflow: hidden;
    vertical-align: middle;
    display: none;
}
.flex .justify-between{
    display: none;
}
    </style>
@section('navsec')

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <h1>All Subjects</h1>
        </div>
        <div class="col-md-2 ">
            <a class="btn btn-secondary btn-sm" href="{{route('subjects.create')}}">Add New Subject</a>

        </div>
        <div class="row">
            <div class="col-md-12 ">

                <table class="table bg-light">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Subject Name</th>
                            <th>class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @if (isset($subjects))

                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $subject->subjects }}</td>
                                    <td>{{ $subject->teacher_class }}</td>
                                    <td><a href="{{route('subjects.show',$subject->id)}}"
                                            class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>


        </div>



    @endsection
