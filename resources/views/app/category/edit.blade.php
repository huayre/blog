@extends('layouts.app')
@section('content')
    <div>

        <div class="card">
            <div class="card-header">
                <h3>Edit {{$category->name}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @csrf
                    <div class="form-group">
                        <label>Name  <span class="badge badge-pill badge-danger">required</span></label>
                        <input  type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="badge badge-pill badge-danger">required</span></label>
                        <textarea class="form-control" name="description">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image  <span class="badge badge-pill badge-danger">required</span></label>
                        <input type="file" value="{{$category->covert}}" class="form-control-file btn btn-outline-primary btn-block" onchange="loadFile(event)" name="covert">
                        <hr>
                        <img id="output" class="img-thumbnail" >
                    </div>
                    {{-- <input type="hidden" value="{{csrf_token()}}" name="_token">--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                    </div>

                </form>
            </div>
        </div>


    </div>

@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

