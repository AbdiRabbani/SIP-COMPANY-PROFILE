@extends('layouts.admin')

@section('content')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: var(--purple);
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
    }

</style>
<div class="container pt-5">
    <form action="{{url('/admin/insights/store')}}" method="post" class="bg-white p-3 rounded"
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
            <label for="">Type</label>
            <select name="type" id="type_insights" onChange="changeType()" class="form-select">
                <option value="">Choose---</option>
                <option value="blog">Blog</option>
                <option value="news">News</option>
            </select>
        </div>
        <div class="mt-2" id="blog_about">
            <label for="">About</label>
            <select name="about[]" id="about_select" class="" multiple="multiple" style="width: 100%;">
                <option value="1">Enterprise Network Infrastructure</option>
                <option value="2">Data center & Cloud</option>
                <option value="3">Cyber Security</option>
                <option value="4">Collaboration & facility</option>
            </select>
        </div>
        <div class="mt-2" id="news_tag">
            <label for="">Tag</label>
            <select name="tag_name[]" id="tag_select" class="" multiple="multiple" style="width: 100%;">
                @foreach($tag as $row)
                <option value="{{$row->tag_name}}">{{$row->tag_name}}</option>
                @endforeach
            </select>
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


    document.querySelector('#blog_about').style.display = 'none';
    document.querySelector('#news_tag').style.display = 'none';

    function changeType() {
        if (document.querySelector('#type_insights').value == 'blog') {

            document.querySelector('#blog_about').style.display = 'block';
            document.querySelector('#news_tag').style.display = 'none';

        } else if (document.querySelector('#type_insights').value == 'news') {

            document.querySelector('#blog_about').style.display = 'none';
            document.querySelector('#news_tag').style.display = 'block';

        } else {

            document.querySelector('#blog_about').style.display = 'none';
            document.querySelector('#news_tag').style.display = 'none';

        }
    }

    $('#about_select').select2({
        multiple: true,
    });

    $('#tag_select').select2({
        tags: true,
        tokenSeparators: [',', ' '], // Memisahkan opsi saat enter
        createTag: function (params) {
            var term = $.trim(params.term);
            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term,
                newTag: true // Menandai tag yang baru ditambahkan
            };
        }
    });

    $('#tag_select').on('select2:select', function (e) {
        var data = e.params.data;
        if (data.newTag) {
            console.log("Tag baru ditambahkan:", data.text);
            // Lakukan aksi yang Anda inginkan dengan tag baru
        }
    });

</script>
@endsection
