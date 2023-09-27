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
    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-semibold" style="font-size: 48px;">Customer</p>
        <div>
            <a href="/admin/project-reference" class="btn btn-warning text-white">Project Reference</a>
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#customerModal">Add</a>
        </div>
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
                        Type
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
                        @if($row->type == 1)
                        FSI and Banking
                        @elseif($row->type == 2)
                        Government
                        @elseif($row->type == 3)
                        Manufacturing
                        @elseif($row->type == 4)
                        Telco & Service Provider
                        @elseif($row->type == 5)
                        Retail
                        @elseif($row->type == 6)
                        Education
                        @endif
                    </td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a class="btn btn-sm btn-warning text-white" data-bs-toggle="modal"
                            data-bs-target="#editCustomerModal" onClick="data('{{$row->id}}')">edit</a>
                        <form action="{{url('admin/customer/d', $row->id)}}" method="post">
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

<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{url('admin/customer/store')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="customerModalLabel">Create Customer</h1>
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
                    <label for="">Type</label>
                    <select name="type" id="" class="form-select">
                        <option value="1">FSI and Banking</option>
                        <option value="2">Government</option>
                        <option value="3">Manufacturing</option>
                        <option value="4">Telco & Service Provider</option>
                        <option value="5">Retail</option>
                        <option value="6">Education</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="">Product</label>
                    <select name="id_product[]" multiple="multiple" id="product_add" style="width: 100%">
                        @foreach($product as $row)
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

<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="form_customer_update" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editCustomerModalLabel">Edit Customer</h1>
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
                            style="height: 100px; width: auto; object-fit: cover;">
                    </div>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Type</label>
                    <select name="type" id="type_partner_edit" class="form-select">
                        <option value="1">FSI and Banking</option>
                        <option value="2">Government</option>
                        <option value="3">Manufacturing</option>
                        <option value="4">Telco & Service Provider</option>
                        <option value="5">Retail</option>
                        <option value="6">Education</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="">Product</label>
                    <select name="id_product[]" multiple="multiple" id="customer_product_edit" style="width: 100%">
                        @foreach($product as $row)
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
    $('#product_add').select2({
        dropdownParent: $('#customerModal'),
        multiple: true,
    });

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
        document.querySelector('#form_customer_update').action = "/admin/customer/update/" + id
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/admin/customer/edit/" + id,
            success: function (response) {
                var data_customer = response.data_customer;
                var data_connector = response.data_connector;
                var selectedValues = data_connector.map(function (item) {
                    return item.id_product;
                });

                document.querySelector('#name_partner_edit').value = data_customer.name
                document.querySelector('#img_edit').setAttribute('src', '/storage/images/' + data_customer
                    .image);
                document.querySelector('#type_partner_edit').value = data_customer.type
                $('#customer_product_edit').val(data_customer.id_product).trigger('change')

                document.querySelectorAll('#customer_product_edit option').forEach(function (option) {
                    option.selected = false;
                });

                selectedValues.forEach(function (value) {
                    var option = document.querySelector('#customer_product_edit option[value="' +
                        value + '"]');
                    if (option) {
                        option.selected = true;
                    }
                });

                $('#customer_product_edit').select2({
                    dropdownParent: $('#editCustomerModal'),
                    multiple: true,
                });
            }
        });
    };

</script>
@endsection
