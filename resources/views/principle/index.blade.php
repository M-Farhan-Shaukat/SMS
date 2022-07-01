@section('navsec')
<div class="container">
    <div class="d-flex">

        <div class="row justify-content-right m-5">
            @if (isset($c_teacher))
                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">All New Teachers</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ count($c_teacher) }}</h6>

                    </div>
                </div>
            @endif



            <div class="col-md-5">
                <h4>All Teachers</h4>
            </div>
            <div class="col-md-5">
                <a class="btn btn-secondary btn-sm" href="{{ route('teacher.create') }}">Create Teacher</a>

            </div>
            <div class="row">
                <div class="col-md-12 ">

                    <table class="table bg-light">
                        <thead>
                            <tr>
                                <th>#.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Class</th>
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
                                        <td><a href="{{ url('/teacher/show/'. $teacher->id) }}"
                                                class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
                <div class="text-center m-auto">
                </div>

            </div>
        </div>
        <div class="row justify-content-left m-5 ">
            @if (isset($c_student))
                <div class="card mb-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">All New Students</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ count($c_student) }}</h6>

                    </div>
                </div>
            @endif



            <div class="col-md-5">
                <h4>All Student</h4>
            </div>
            <div class="col-md-5">
                <a class="btn btn-secondary btn-sm" href="{{ route('student.create') }}">Create Student</a>

            </div>
            <div class="row">
                <div class="col-md-12 ">

                    <table class="table bg-light">
                        <thead>
                            <tr>
                                <th>#.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($students))
                                <?php $j = 1; ?>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $j++ }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ substr($student->email, 0, 10) }}{{ strlen($student->email) > 10 ? '...' : '' }}
                                        </td>
                                        <td>{{ $student->class }}</td>
                                        <td><a href="{{ url('/student/show/'. $student->id) }}"
                                                class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
                <div class="text-center m-auto">
                </div>

            </div>
        </div>
    </div>

    @endsection
