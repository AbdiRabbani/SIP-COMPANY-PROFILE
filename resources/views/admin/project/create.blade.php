@extends('layouts.admin')

@section('content')
<style>
    form {
        background: white;
        padding: 10px;
        border-radius: 10px;
    }

</style>
<div class="container p-3">
    <div>
        <p class="fw-semibold fs-5 bg-white p-1 rounded">
            @if($id_ == 1)
            Enterprise Network Infrastructure
            @elseif($id_ == 2)
            Data Center & Cloud
            @elseif($id_ == 3)
            Cyber Security
            @else
            Collaboration & Facility
            @endif
        </p>
    </div>
    <p class="fw-semibold mt-4">~ FSI and Banking</p>
    @if(!$fsi)
    <form action="{{url('admin/project-reference/store')}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="1" hidden>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    @else
    <form action="{{url('admin/project-reference/update', $fsi->id)}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$fsi->name}}">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="{{$fsi->type}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$fsi->image)}}" class="img-thumbnail form-control" alt=""
            style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$fsi->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    @endif
    <p class="fw-semibold mt-4">~ Government</p>
    @if(!$government)
    <form action="{{url('admin/project-reference/store')}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="2" hidden>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    @else
    <form action="{{url('admin/project-reference/update', $government->id)}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$government->name}}">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="{{$government->type}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$government->image)}}" class="img-thumbnail form-control" alt=""
            style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$government->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    @endif
    <p class="fw-semibold mt-4">~ Manufacturing</p>
    @if(!$manufacturing)
    <form action="{{url('admin/project-reference/store')}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="3" hidden>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    @else
    <form action="{{url('admin/project-reference/update', $manufacturing->id)}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$manufacturing->name}}">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="{{$manufacturing->type}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$manufacturing->image)}}" class="img-thumbnail form-control" alt=""
            style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$manufacturing->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    @endif
    <p class="fw-semibold mt-4">~ Telco & Service</p>
    @if(!$telco)
    <form action="{{url('admin/project-reference/store')}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="4" hidden>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    @else
    <form action="{{url('admin/project-reference/update', $telco->id)}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$telco->name}}">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="{{$telco->type}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$telco->image)}}" class="img-thumbnail form-control" alt=""
            style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$telco->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    @endif
    <p class="fw-semibold mt-4">~ Retail</p>
    @if(!$retail)
    <form action="{{url('admin/project-reference/store')}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="5" hidden>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    @else
    <form action="{{url('admin/project-reference/update', $retail->id)}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$retail->name}}">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="{{$retail->type}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$retail->image)}}" class="img-thumbnail form-control" alt=""
            style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$retail->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    @endif
    <p class="fw-semibold mt-4">~ Education</p>
    @if(!$education)
    <form action="{{url('admin/project-reference/store')}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="6" hidden>
        <label for="">Image</label>
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control"></textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
    @else
    <form action="{{url('admin/project-reference/update', $education->id)}}" method="post" class="col-md-10 mt-4"
        enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Name</label>
        <input name="name" type="text" class="form-control" value="{{$education->name}}">
        <input name="about" type="text" class="form-control" value="{{$id_}}" hidden>
        <input name="type" type="text" class="form-control" value="{{$education->type}}" hidden>
        <label for="">Image</label>
        <img src="{{asset('storage/images/'.$education->image)}}" class="img-thumbnail form-control" alt=""
            style="width: 250px;">
        <input name="image" type="file" class="form-control">
        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" class="form-control">{{$education->desc}}</textarea>
        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
    @endif
</div>
@endsection
