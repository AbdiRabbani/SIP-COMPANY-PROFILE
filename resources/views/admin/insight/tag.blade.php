@extends('layouts.admin')

@section('content')
<div class="container p-4">
    <div class="table table-responsinve p-3 rounded bg-white">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <td>
                        Tag Name
                    </td>
                    <td class="text-center">
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td class="text-center">
                        <p class="p-1 rounded text-white" style="background: var(--purple); width: max-content;">
                            #{{$row->tag_name}}</p>
                    </td>
                    <td class="text-center">
                        <form action="{{url('admin/tag/delete', $row->id)}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <a class="btn btn-sm btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#TagModal" onClick="data('{{$row->id}}')">Edit</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="TagModal" tabindex="-1" aria-labelledby="TagModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TagModalLabel">Edit Tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_tag_update" method="post">
                @csrf
                {{method_field('put')}}
                <div class="modal-body">
                    <label for="">Tag Name</label>
                    <input type="text" name="tag_name" class="form-control" id="name_tag_edit">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $('#myTable').DataTable();

    function data(id) {
        document.querySelector('#form_tag_update').action = "/admin/tag/update/" + id
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/admin/tag/edit/" + id,
            success: function (response) {
                document.querySelector('#name_tag_edit').value = response.tag_name
            }
        });
    };

</script>
@endsection
