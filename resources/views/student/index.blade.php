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
            <h1>All Student</h1>
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
                        @if (isset($students))

                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ substr($student->email, 0, 10) }}{{ strlen($student->email) > 10 ? '...' : '' }}
                                    </td>
                                    <td>{{ $student->class }}</td>
                                    <td><a href="{{ route('student.show', $student->id) }}"
                                            class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

            </div>


        </div>



    @endsection
