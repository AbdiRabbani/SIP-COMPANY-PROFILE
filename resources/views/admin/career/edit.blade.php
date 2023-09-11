@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <form id="form_career_update" action="{{url('/admin/career/update', $data->id)}}" method="post">
        @csrf
        {{method_field('put')}}
        <h1 class="fs-5" id="editCustomerModalLabel">Edit Customer Category</h1>
            <div class="mt-3">
                <label for="">Position</label>
                <input required type="text" name="position" class="form-control" value="{{$data->position}}">
            </div>
            <div class="mt-3">
                <label for="">Location</label>
                <input required type="text" name="location" class="form-control" value="{{$data->location}}">
            </div>
            <div class="mt-3">
                <label for="">Status</label>
                <select name="status" class="form-select">
                    <option value="{{$data->status}}">{{$data->status}} --current</option>
                    <option value="Fulltime">Fulltime</option>
                    <option value="Contract">Contract</option>
                    <option value="Internship">Internship</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="">Requirement</label>
                <textarea name="desc" cols="10" id="editor" class="form-control">
                    {{$data->desc}}
                </textarea>
            </div>
            <div class="mt-3 text-end">
            <button type="submit" class="btn btn-success">Save</button>
            </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/39.0.1/ckeditor.min.js"
    integrity="sha512-sDgY/8SxQ20z1Cs30yhX32FwGhC1A4sJJYs7kwa2EnvCeepR/S1NbdXNLd6TDJC0J5cV34ObeQIYekYRK8nJkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}'
            }
        })
        .catch(error => {
            console.log(error);
        });
</script>
@endsection
