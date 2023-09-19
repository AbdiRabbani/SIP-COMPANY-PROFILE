@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-semibold" style="font-size: 48px;">Job Opportunity</p>
        <div>
            <a href="{{url('/admin/career/register')}}" class="btn btn-warning text-white">Registered</a>
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#customerModal">Add</a>
        </div>
    </div>
    <div class="table table-responsive bg-white p-4 rounded">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <td>
                        Position
                    </td>
                    <td>
                        Location
                    </td>
                    <td>
                        Status
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
                        {{$row->position}}
                    </td>
                    <td>
                        {{$row->location}}
                    </td>
                    <td>
                        {{$row->status}}
                    </td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{url('admin/career/edit', $row->id)}}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <form action="{{url('admin/career/d', $row->id)}}" method="post">
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

<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{url('admin/career/store')}}" method="post">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="customerModalLabel">Create Customer Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-3">
                    <label for="">Position</label>
                    <input required type="text" name="position" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Location</label>
                    <input required type="text" name="location" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-select">
                        <option value="Fulltime">Full Time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="">Requirement</label>
                    <textarea name="desc" cols="10" id="editor1" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/39.0.1/ckeditor.min.js"
    integrity="sha512-sDgY/8SxQ20z1Cs30yhX32FwGhC1A4sJJYs7kwa2EnvCeepR/S1NbdXNLd6TDJC0J5cV34ObeQIYekYRK8nJkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    ClassicEditor
        .create(document.querySelector('#editor1'), {
            ckfinder: {
                uploadUrl: '{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}'
            }
        })
        .catch(error => {
            console.log(error);
        });
</script>
@endsection
