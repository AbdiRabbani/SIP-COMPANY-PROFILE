@extends('layouts.admin')

@section('content')
<style>
    .floating-button:hover {
        bottom: 50px;
        animation: none;
        color: rgb(215, 215, 215);
    }

    .floating-button {
        display: none;
        z-index: 99;
        position: fixed;
        right: 30px;
        bottom: 30px;
        background: var(--purple);
        padding: 15px;
        border-radius: 10px;
        transition: 0.4s;
        cursor: pointer;
        box-shadow: rgba(0, 0, 0, 0.238) 0px 0px 10px;
        text-decoration: none;
        color: white;
    }

    @media screen and (max-width: 767px) {
        .floating-button {
            display: block;
        }
    }

    .floating-button:nth-child(2) {
        right: 140px;
    }

</style>
<div class="container pt-5 d-flex flex-wrap">
    <div class="col-md-12" id="partnership">
        <div class="d-flex justify-content-between align-items-center col-md-10">
            <p class="fw-semibold" style="font-size: 48px;">Category</p>
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#partnershipModal">Add</a>
        </div>
        <div class="table table-responsive col-md-10 bg-white rounded p-3">
            <table class="table" id="myTable1">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            About
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partnership as $row)
                    <tr>
                        <td>
                            {{$row->name}}
                        </td>
                        <td>
                            @if($row->about == 1)
                            Enterprise Network Infrastructure
                            @elseif($row->about == 2)
                            Data center & Cloud
                            @elseif($row->about == 3)
                            Cyber Security
                            @elseif($row->about == 4)
                            Collaboration & Facility
                            @endif
                        </td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a class="btn btn-sm btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#editPartnershipModal"
                                onClick="dataPartnership('{{$row->id}}')">Edit</a>
                            <form action="{{url('admin/category/dp', $row->id)}}" method="post" style="display: none;">
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
</div>

<!-- Modal -->
<div class="modal fade" id="partnershipModal" tabindex="-1" aria-labelledby="partnershipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{url('admin/category/store')}}" method="post">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="partnershipModalLabel">Create Partnership Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-3">
                    <label for="">Name</label>
                    <input required type="text" name="name" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">About</label>
                    <select name="about" id="" class="form-select">
                        <option value="1">Enterprise Network Infrastructure</option>
                        <option value="2">Data center & Cloud</option>
                        <option value="3">Cyber Security</option>
                        <option value="4">Collaboration & Facility</option>
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
        <form class="modal-content" id="form_partnership_update" method="post">
            @csrf
            {{method_field('put')}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPartnershipModalLabel">Edit Partnership Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-3">
                    <label for="">Name</label>
                    <input required type="text" name="name" class="form-control" id="name_partner_edit">
                </div>
                <div class="mt-3">
                    <label for="">About</label>
                    <select name="about" id="about_partner_edit" class="form-select">
                        <option value="1">Enterprise Network Infrastructure</option>
                        <option value="2">Data center & Cloud</option>
                        <option value="3">Cyber Security</option>
                        <option value="4">Collaboration & Facility</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function dataPartnership(id) {
        document.querySelector('#form_partnership_update').action = "/admin/category/p/update/" + id
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/admin/category/p/edit/" + id,
            success: function (response) {
                document.querySelector('#name_partner_edit').value = response.name
                document.querySelector('#about_partner_edit').value = response.about
            }
        });
    };

</script>
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

    $('#myTable1').DataTable()

</script>
@endsection
