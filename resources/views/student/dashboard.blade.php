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

<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">


            <h3>{{ $students->name }}</h3>

            <h3 class="lead"> Email : {{ $students->email }}</h3>

            <h3 class="lead"> Class : {{ $students->class }}</h3>

            <h3 class="lead"> Contact : {{ $students->contact }}</h3>

            <h3 class="lead"> Age : {{ $students->age }}</h3>

            <h3 class="lead">Address : {{ $students->address }}</h3>
                <hr>

                @if (count($results) != 0)
                @if (isset($results))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Total Marks</th>
                                <th>Obtained Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->subject->subjects }}</td>
                                    <td>{{ $result->total_marks }}</td>
                                    <td>{{ $result->marks }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>
</div>



    @endsection
