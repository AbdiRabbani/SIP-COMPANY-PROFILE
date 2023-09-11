@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-semibold" style="font-size: 48px;">Campaign</p>
        <a href="{{url('/admin/campaign/create')}}" class="btn btn-success">Add</a>
    </div>
    <div class="table table-responsive bg-white p-4 rounded">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <td>
                        Title
                    </td>
                    <td>
                        Image
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
                        {{$row->title}}
                    </td>
                    <td>
                        <img src="{{asset('storage/images/' .$row->image)}}" alt="" class="img-fluid" style="max-width: 200px">
                    </td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{url('admin/campaign/edit', $row->id)}}" class="btn btn-sm btn-warning text-white">edit</a>
                        <form action="{{url('/admin/campaign/delete', $row->id)}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <button class="btn btn-sm btn-danger remove-data">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
</script>
@endsection
