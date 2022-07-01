<!------ Include the above in your HEAD tag ---------->
@extends('layouts.app')
@section('title', '| Create')
@section('navsec')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-10">
                <h1>Create New Teacher</h1>
            </div>
            {{-- <div class="col-md-2 ">
            <a class="btn btn-secondary btn-block" href="{{ route('result.index') }}">
                << See All Subjects</a>
        </div> --}}
            <div class="col-md-8 mt-5">
                <form action="{{ route('result.store') }}" method="POST">
                    @csrf
                    <div class="panel panel-default">
                        <div id="education_fields">
                        </div>
                        <div class="panel-body">
                            <input type="hidden" name="student_id" value="{{$stu_id}}">
                            <div class="input-group">
                                <div class="form-group ml-3 pl-3 pr-3">
                                   <strong> <label for="Subject">Subject:</label></strong>
                                    <select class="form-control" id="subject_id" name="result[0][subject_id]">
                                        <option value="">Subjects</option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id, $subject->subjects }}">{{ $subject->subjects }}</option>
                                         @endforeach
                                    </select>
                            </div>

                            <div class="form-group ml-3">
                               <strong> <label for="Total Marks">Total Marks:</label></strong>

                                <input type="text" class="form-control" id="total_marks" name="result[0][total_marks]"
                                    value="" placeholder="Total Marks">
                            </div>

                            <div class="form-group ml-3">
                               <strong> <label for="Marks">Marks:</label></strong>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="marks" name="result[0][marks]" value=""
                                    placeholder="Obtained Marks">
                                    <div class="input-group-btn">
                                      &nbsp;  <button class="btn btn-success " type="button" onclick="education_fields();">
                                            +</button>
                                    </div>
                                </div>
                            </div>
                              </div>

                            <div class="clear"></div>
                        </div>

                        <div class="panel-footer text-center">
                           <b>
                            <strong>Press <b>+</b> to add another form field :)</strong>
                            ,<strong>Press <b>-</b> to remove form field :)</strong>
                           </b>
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a type="button" href="{{ route('result.show',$stu_id) }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
<script>
    var room = 0;

    function education_fields() {

        room++;
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="input-group"><div class="form-group ml-3 pl-3 pr-3"><strong> <label for="Subject">Subject:</label></strong><select class="form-control" id="subject_id" name="result['+room+'][subject_id]"><option value="">Subjects</option>@foreach ($subjects as $subject)<option value="{{ $subject->id, $subject->subjects }}">{{ $subject->subjects }}</option> @endforeach</select></div><div class="form-group ml-3"><strong> <label for="Total Marks">Total Marks:</label></strong><input type="text" class="form-control" id="total_marks" name="result['+room+'][total_marks]" value="" placeholder="Total Marks"></div><div class="form-group ml-3"><strong> <label for="Marks">Marks:</label></strong> <div class="input-group"> <input type="text" class="form-control" id="marks" name="result['+room+'][marks]" value="" placeholder="Obtained Marks"><div class="input-group-btn ml-2"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room +');">-</button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest)
    }

    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>

