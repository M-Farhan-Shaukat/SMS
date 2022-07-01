<!------ Include the above in your HEAD tag ---------->
@extends('layouts.app')
@section('title', '| Create')
@section('navsec')
@php $count = 1000;
$i=1;
@endphp
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-10">
                <h1>Create New Teacher</h1>
            </div>

            <div class="col-md-8 mt-5">

                <form action="{{ route('result.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <input type="hidden" name="student_id" value="{{$stu_id}}">
                            @foreach ($result as $row)
                            @php $c=$count++;
                            $j=$i++; @endphp

                            <div class="input-group form-group removeclass{{$c}}">
                                <div class="form-group ml-3 pl-3 pr-3  ">
                                  <strong> <label for="Subject">Subject:</label></strong>
                                    <select class="form-control" id="subject_id" name="result[{{$j}}][subject_id]">
                                        @foreach ($subjects as $subject)
                                            @if($subject->id == $row->subject_id)
                                                <option selected  value="{{$row->subject_id}}">{{$row->subject->subjects}}</option>
                                            @else
                                                <option value="{{ $subject->id, $subject->subjects }}">{{ $subject->subjects }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group ml-3">
                                <strong> <label for="Total Marks">Total Marks:</label></strong>

                                    <input type="text" class="form-control" id="total_marks" name="result[{{$j}}][total_marks]"
                                        value="{{$row->total_marks}}" placeholder="Total Marks">
                                </div>

                                <div class="form-group ml-3">
                                <strong> <label for="Marks">Marks:</label></strong>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="marks" name="result[{{$j}}][marks]" value="{{$row->marks}}"
                                        placeholder="Obtained Marks">
                                        <div class="input-group-btn">
                                        &nbsp;
                                        @if($c==1000)
                                                <button class="btn btn-success "  type="button" onclick="education_fields();">
                                                +</button>
                                                @else
                                                <button class="btn btn-danger " type="button" onclick="remove_education_fields2();">
                                                -</button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            <div class="clear"></div>
                        </div>
                        <div id="education_fields">
                        </div>

                        <div class="panel-footer text-center">
                           <b>
                            <strong>Press <b>+</b> to add another form field :)</strong>
                            ,<strong>Press <b>-</b> to remove form field :)</strong>
                           </b>
                        </div><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a type="button" href="{{ route('subjects.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
<script>
    let php_var = "<?php echo json_encode($j); ?>";
    console.log(php_var);
    var room = php_var;

    function education_fields() {

        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="input-group"><div class="form-group ml-3 pl-2 pr-3"><strong> <label for="Subject">Subject:</label></strong><select class="form-control" id="subject_id" name="result['+room+'][subject_id]"><option value="">Subjects</option>@foreach ($subjects as $subject)<option value="{{ $subject->id, $subject->subjects }}">{{ $subject->subjects }}</option> @endforeach</select></div><div class="form-group ml-3"><strong> <label for="Total Marks">Total Marks:</label></strong><input type="text" class="form-control" id="total_marks" name="result['+room+'][total_marks]" value="" placeholder="Total Marks"></div><div class="form-group ml-3"><strong> <label for="Marks">Marks:</label></strong> <div class="input-group"> <input type="text" class="form-control" id="marks" name="result['+room+'][marks]" value="" placeholder="Obtained Marks"><div class="input-group-btn ml-2"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room +');">-</button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest)
    }

    var cid = 1000;
    function remove_education_fields2() {
        cid++
        $('.removeclass'+cid).remove();
    }
    function remove_education_fields(rid) {

        $('.removeclass'+rid).remove();
    }
</script>

