<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="container-fluid pt-5 d-flex row align-items-center justify-content-center">
    <p class="fw-semibold fs-5 text-center">Message</p>
    <div class="bg-white p-4 rounded shadow col-md-8">
        <p>From : {{$data['name']}}</p>
        <p>For : {{$data['for']}}</p>
        <p>Company : {{$data['business']}}</p>
        <p>Email : {{$data['email']}}</p>
        <p>Phone : {{$data['phone']}}</p>
        <p style="text-align: justify;">Request : {{$data['request']}}</p>
        <div class="text-end">
            <a href="{{url('http://localhost:8000/message')}}" target="_blank" class="btn btn-success btn-sm">Go to website</a>
        </div>
    </div>
</body>
</html>