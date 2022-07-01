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
            <h1>All Teachers</h1>
        </div>
        <div class="row">
            <div class="col-md-12 ">

                <table class="table bg-light">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @if (isset($teachers))

                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ substr($teacher->email, 0, 10) }}{{ strlen($teacher->email) > 10 ? '...' : '' }}
                                    </td>
                                    <td>{{ $teacher->class }}</td>
                                    <td><a href="{{ route('teacher.show', $teacher->id) }}"
                                            class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>


        </div>



    @endsection
