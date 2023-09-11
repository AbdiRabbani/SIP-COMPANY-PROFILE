@extends('layouts.admin')

@section('content')
<div class="container d-flex justify-content-center">
    <form action="{{url('admin/project-reference/update', $data->id)}}" method="post" class="col-md-10 mt-4" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$data->name}}">
        <input name="id_category" type="text" class="form-control" value="{{$id_}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$data->image)}}" class="img-thumbnail form-control" alt="" style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$data->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection