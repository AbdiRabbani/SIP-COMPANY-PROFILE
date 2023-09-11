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
    <form action="{{url('/admin/insights/update', $data->id)}}" method="post" class="bg-white p-3 rounded"
        enctype="multipart/form-data">
        @csrf
        {{method_field('put')}}
        <div class="mt-2">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" value="{{$data->title}}">
        </div>
        <div class="mt-2 d-flex row">
            <label for="">Change image</label>
            <img src="{{asset('storage/images/' .$data->image)}}" alt="" class="img-fluid"
                style="width: 200px; margin: 10px 0px;">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mt-2">
            <label for="">Type</label>
            <select name="type" id="type_insights" onChange="changeType()" class="form-select">
                <option value="{{$data->type}}">
                    @if($data->type == 'blog')
                    Blog
                    @elseif($data->type == 'news')
                    News
                    @endif
                    --current
                </option>
                <option value="blog">Blog</option>
                <option value="news">News</option>
            </select>
        </div>
        <div class="mt-2" id="blog_about">
            <label for="">About</label>
            <select name="about[]" id="about_select" class="" multiple="multiple" style="width: 100%;">
                <option value="1" @foreach($about as $row) @if($row->about == 1) selected @endif @endforeach>Enterprise
                    Network Infrastructure</option>
                <option value="2" @foreach($about as $row) @if($row->about == 2) selected @endif @endforeach>Data center
                    & Cloud</option>
                <option value="3" @foreach($about as $row) @if($row->about == 3) selected @endif @endforeach>Cyber
                    Security</option>
                <option value="4" @foreach($about as $row) @if($row->about == 4) selected @endif
                    @endforeach>Collaboration & facility</option>
            </select>
        </div>
        <div class="mt-2" id="news_tag">
            <label for="">Tag</label>
            <select name="tag_name[]" id="tag_select" class="" multiple="multiple" style="width: 100%;">
                @foreach($tag as $row)
                <option value="{{$row->tag_name}}" @if(in_array($row->id, array_column($connector, 'id_tag'))) selected
                    @endif> {{$row->tag_name}}
                </option>
                @endforeach
            </select>
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
            console.error(error);
        });


    changeType()

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
