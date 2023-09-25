@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <p class="career-title fw-semibold text-center" style="margin-top: 100px; font-family: HemiHead;" >Work With Us</p>

    <div class="d-flex mt-5 flex-wrap-reverse gap-3 justify-content-around">
        <div class="col-md-6">
            <p class="fs-5 fw-semibold" style="font-family: HemiHead;">Reach yout dream with us</p>
            <p style="margin-bottom: 130px; text-align: justify;">We offer solutions related to network
                infrastructure, data center infrastructure, network security,
                and collaboration. Offering a wide range of services, it provides high quality, cost savings, and
                lightning-fast project delivery times that meet the specialize needs of its clients.</p>
        </div>
        <div class="col-md-5 d-flex justify-content-around align-items-center">
            <img class="col-md-10 rounded" style="height: 320px; object-fit: cover; object-position: center;"
                src="{{asset('custom/images/pak-agus.png')}}"
                alt="">
        </div>
    </div>
</div>
<div class="container mt-5" id="jobs">
    <p class="fw-semibold fs-5" style="font-family: HemiHead;">Current Job Opportunities</p>
    <div class="career-job">
        <div class="d-flex justify-content-start" style="overflow: scroll;">
            <div class="form-check">
                <input class="form-check-input ms-1"onClick="allData()" type="radio"
                    name="exampleRadios" id="exampleRadios1" value="all" checked>
                <label class="" for="exampleRadios1">All</label>
            </div>
            <div class="form-check">
                <input class="form-check-input ms-1" onClick="data('Fulltime')" type="radio"
                    name="exampleRadios" id="exampleRadios4" value="Fulltime">
                <label class="" for="exampleRadios4">Full Time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input ms-1"onClick="data('Contract')" type="radio"
                    name="exampleRadios" id="exampleRadios2" value="Contract">
                <label class="" for="exampleRadios2">Contract</label>
            </div>
            <div class="form-check">
                <input class="form-check-input ms-1"onClick="data('Internship')" type="radio"
                    name="exampleRadios" id="exampleRadios3" value="Internship">
                <label class="" for="exampleRadios3">Internship</label>
            </div>
        </div>
        <div class="table table-responsive">
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

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="careerModal" tabindex="-1" aria-labelledby="careerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="requirement_text">

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $('#myTable').DataTable();

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/career/data",
            success: function (response) {
                var data = ""
                $.each(response, function (key, value) {
                    data = data + "<tr>"
                    data = data +
                        '<td onClick="req()" data-bs-toggle="modal" data-bs-target="#careerModal">' +
                        value.position + "</td>"
                    data = data + "<td>" + value.location + "</td>"
                    data = data + "<td>" + value.status + "</td>"
                    data = data +
                        '<td class="d-flex flex-wrap-reverse justify-content-center gap-1">'
                    data = data +
                        '<a data-bs-toggle="modal" data-bs-target="#careerModal" class="btn btn-req btn-warning btn-sm text-white" onClick="show(' +
                        value.id + ')">Requirement</a>'
                    data = data + '<a href="/join/' + value.id +
                        '" class="btn btn-success btn-sm">Apply</a>'
                    data = data + "</td>"
                    data = data + "</tr>"
                })
                $('tbody').html(data);
            }
        })
    };

    allData();

    function data(name) {
        console.log(name);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/career/data/" + name,
            success: function (response) {
                var data = ""
                $.each(response, function (key, value) {
                    data = data + "<tr>"
                    data = data + '<td>' + value.position + "</td>"
                    data = data + "<td>" + value.location + "</td>"
                    data = data + "<td>" + value.status + "</td>"
                    data = data +
                        '<td class="d-flex flex-wrap-reverse justify-content-center gap-1">'
                    data = data +
                        '<a data-bs-toggle="modal" data-bs-target="#careerModal" class="btn btn-warning btn-sm text-white">Requirement</a>'
                    data = data + '<a href="/join/' + value.id +
                        '" class="btn btn-success btn-sm">Apply</a>'
                    data = data + "</td>"
                    data = data + "</tr>"
                });
                $('tbody').html(data);
            }
        })
    };

    function show(id) {
        console.log(id);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/career/detail/" + id,
            success: function (response) {
                var data = ""
                document.querySelector('#requirement_text').innerHTML = response.desc
            }
        })
    };

</script>
@endsection
