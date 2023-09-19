@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <form action="{{url('/admin/project-reference/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Project Name</label>
        <input type="text" name="name" class="form-control">

        <label for="">Image</label>
        <input type="file" name="image" class="form-control">

        <label for="">Type</label>
        <select name="type" id="" class="form-select">
            <option value="1">FSI and Banking</option>
            <option value="2">Government</option>
            <option value="3">Telco & Service</option>
            <option value="4">Service</option>
            <option value="5">Retail</option>
            <option value="6">Education</option>
        </select>

        <label for="">Product</label>
        <select name="id_product" id="" class="form-select">
            @foreach($product as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>

        <label for="">Description</label>
        <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>

        <div class="text-end mt-3">
            <button class="btn btn-success">Add</button>
        </div>
    </form>
</div>
@endsection