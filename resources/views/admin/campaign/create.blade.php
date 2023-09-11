@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <form action="{{url('/admin/campaign/store')}}" method="post" class="bg-white p-3 rounded"
        enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <label for="">Title</label>
            <input required type="text" name="title" class="form-control">
        </div>
        <div class="mt-2">
            <label for="">Choose image</label>
            <input required type="file" name="image" class="form-control">
        </div>
        <div class="mt-2">
            <label for="">Text</label>
            <textarea name="paragraph" id="editor" rows="5" class="form-control"></textarea>
        </div>
        <div class="mt-2 text-end">
            <button type="submit" class="btn btn-success">Add</button>
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
