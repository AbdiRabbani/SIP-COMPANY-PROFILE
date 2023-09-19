@extends('layouts.admin')

@section('content')
<div class="container p-4">
    <div class="table table-responsive p-3 bg-white">
        <div class="mb-3 text-end">
        <a href="/admin/project-reference/create" class="btn btn-success">Add</a>
        </div>
        <table class="table table-stripped" id="myTable">
            <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Image
                    </td>
                    <td>
                        Product
                    </td>
                    <td>
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
                    {{$row->product->name}}
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{url('/admin/project-reference/edit', $row->id)}}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form action="{{url('/admin/project-reference/destroy', $row->id)}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button class="btn btn-danger btn-sm remove-data">Delete</button>
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
        <div class="modal-content align-items-center">
            <img id="img_modal" style="width: 250px;" alt="">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $('#myTable').DataTable()

    function image(name) {
        document.querySelector('#img_modal').setAttribute('src', '/storage/images/' + name)
    }

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
</script>
@endsection