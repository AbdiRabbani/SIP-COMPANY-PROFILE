@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-semibold" style="font-size: 48px;">Partnership</p>
        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#partnershipModal">Add</a>
    </div>
    <div class="table table-responsive bg-white p-4 rounded">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Image
                    </td>
                    <td>
                        Level
                    </td>
                    <td class="text-center">
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>
                        {{$row->name}}
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm text-white" data-bs-toggle="modal"
                            data-bs-target="#imageModal" onClick="image('{{$row->image}}')">See Image</button>
                    </td>
                    <td>
                        {{$row->level}}
                    </td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a class="btn btn-sm btn-warning text-white" data-bs-toggle="modal"
                            data-bs-target="#editPartnershipModal" onClick="data('{{$row->id}}')">Edit</a>
                        <form action="{{url('admin/partnership/d', $row->id)}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button class="btn btn-sm btn-danger remove-data">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content align-items-center py-4">
            <img id="img_modal" style="width: 250px;" alt="">
        </div>
    </div>
</div>

<div class="modal fade" id="partnershipModal" tabindex="-1" aria-labelledby="partnershipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{url('admin/partnership/store')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="partnershipModalLabel">Create Partnership</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-3">
                    <label for="">Name</label>
                    <input required type="text" name="name" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Image</label>
                    <input required type="file" name="image" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Level</label>
                    <select name="level" id="" class="form-select">
                        <option value="Excelent">Excelent</option>
                        <option value="Great">Great</option>
                        <option value="Good">Good</option>
                        <option value="Authorized">Authorized</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="">Category</label>
                    <select name="id_category" id="" class="form-select">
                        @foreach($category as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editPartnershipModal" tabindex="-1" aria-labelledby="editPartnershipModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_partner_update" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPartnershipModalLabel">Edit Partnership</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-3">
                    <label for="">Name</label>
                    <input required type="text" name="name" class="form-control" id="name_partner_edit">
                </div>
                <div class="mt-3">
                    <label for="">Image</label>
                    <div>
                        <img alt="" src="" class="img-thumbnail col-md-6" id="img_edit"
                            style="height: 200px; object-fit: contain;">
                    </div>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Level</label>
                    <select name="level" id="level_partner_edit" class="form-select">
                        <option value="Excelent">Excelent</option>
                        <option value="Great">Great</option>
                        <option value="Good">Good</option>
                        <option value="Authorized">Authorized</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="">Category</label>
                    <select name="id_category" id="category_partner_edit" class="form-select">
                        @foreach($category as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.remove-data').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    '',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })
    });

    $('#myTable').DataTable()

    function image(name) {
        document.querySelector('#img_modal').setAttribute('src', '/storage/images/' + name)
    }

    function data(id) {
        document.querySelector('#form_partner_update').action = "/admin/partnership/update/" + id
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/admin/partnership/edit/" + id,
            success: function (response) {
                document.querySelector('#name_partner_edit').value = response.name
                document.querySelector('#img_edit').setAttribute('src', '/storage/images/' + response
                    .image);
                document.querySelector('#level_partner_edit').value = response.level
                document.querySelector('#category_partner_edit').value = response.id_category
            }
        });
    };
</script>
@endsection
