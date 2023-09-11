@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <form action="{{url('/admin/campaign/update', $data->id)}}" method="post" class="bg-white p-3 rounded" enctype="multipart/form-data">
        @csrf
        {{method_field('put')}}
        <div class="mt-2">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" value="{{$data->title}}">
        </div>
        <div class="mt-2 d-flex row">
            <label for="">Choose image</label>
            <img src="{{asset('storage/images/' .$data->image)}}" alt="" class="img-fluid" style="width: 200px; margin: 10px 0px;">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mt-2">
            <label for="">Text</label>
            <textarea name="paragraph" id="editor" rows="5" class="form-control">{{$data->paragraph}}</textarea>
        </div>
        <div class="mt-2 text-end">
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
