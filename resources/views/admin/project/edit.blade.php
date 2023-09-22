@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <form action="{{url('/admin/project-reference/update', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <label for="">Project Name</label>
        <input type="text" name="name" class="form-control" value="{{$data->name}}">

        <label for="">Image</label>
        <div>
            <img alt="" src="{{asset('storage/images/' .$data->image)}}" class="img-thumbnail col-md-6" id="img_edit" style="height: 100px; width: auto; object-fit: cover;">
        </div>
        <input type="file" name="image" class="form-control">

        <label for="">Type</label>
        <select name="type" id="" class="form-select">
            <option value="{{$data->type}}" selected>
                @if($data->type == 1)
                FSI and Banking
                @elseif($data->type == 2)
                Government
                @elseif($data->type == 3)
                Manufacturing
                @elseif($data->type == 4)
                Telco & Service Provider
                @elseif($data->type == 5)
                Retail
                @elseif($data->type == 6)
                Education
                @endif
                --current
            </option>
            <option value="1">FSI and Banking</option>
            <option value="2">Government</option>
            <option value="3">Telco & Service</option>
            <option value="4">Service</option>
            <option value="5">Retail</option>
            <option value="6">Education</option>
        </select>

        <label for="">Product</label>
        <select name="id_product" id="" class="form-select">
            <option value="{{$data->id_product}}" selected>{{$data->partner_section->name}} --current</option>
            @foreach($product as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>

        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{$data->desc}}</textarea>

        <div class="text-end mt-3">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection
