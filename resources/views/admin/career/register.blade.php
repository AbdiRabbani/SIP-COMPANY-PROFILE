@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-semibold" style="font-size: 48px;">Register</p>
    </div>
    <div class="table table-responsive bg-white p-4 rounded">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Position
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
                        {{$row->name}}
                    </td>
                    <td>
                        {{$row->email}}
                    </td>
                    <td>
                        {{$row->career->position}}
                    </td>
                    <td>
                        {{$row->career->status}}
                    </td>
                    <td class="d-flex gap-2 justify-content-center">
                        <form action="{{url('/admin/career/register', $row->id)}}" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <a href="{{asset('storage/file/' .$row->cv)}}" target="_blank" class="btn btn-warning btn-sm text-white">See CV</a>
                            <button class="btn btn-sm btn-danger">Delete</button>
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
                    <input type="text" name="position" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-select">
                        <option value="fulltime">Full Time</option>
                        <option value="contract">Contract</option>
                        <option value="intern">Internship</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
        $('#myTable').DataTable()
</script>
@endsection
