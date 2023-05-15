<!DOCTYPE html>
<html lang="en">
<head>
   @inlude('dashboard.layout.head')
</head>
<body class="bg-dark">
@include('dashboard.layout.navbar')
<div class="container ps-5 pe-5">
    <div class="row">
        <div class="col-12 p-2 text-left text-light mt-4">
            <h1 class="p-2">Users</h1>

            <div class="p-2 mt-4 mb-4 border-bottom-white border-top-black">
                <button type="button" class="btn btn-sm btn-dark" onclick="">
                    New User
                </button> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="dataTableErrorContainer">
                <ul class="text-danger" id="dataTableErrorsUl"></ul>
            </div>
        </div>
        <div class="col-12">
            <table id="dataTable" class="table table-striped table-bordered responsive text-dark w-100">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
<script src="{{ mix('js/jquery.min.js') }}"></script>
<script> 
    let tableUrl = "/api/dashboard/users/index";

    function createDataTable(tableId, url, columns) {
        return $("#" + tableId).DataTable({
            ajax: {
                url:url,
                type: "GET",
                complete: function(jqXHR) {
                    if(jqXHR.status === 200) {
                        $("#dataTableErrorsUl").empty();
                        $("#dataTableErrorsContainer").hide();
                    }
                },
                error function(jqXHR, textStatus, errorThrown) {
                    $("#dataTableErrorsUl").empty();
                    $("#dataTableErrorsUl").append(
                        "<li>" +
                            "An error has occured. Please try again at a later time. If the problem persists, contact us for support." +
                            </li>
                    );
                    $("#dataTableErrorsContainer").hide();
                }
            },
            pageLength: 10,
            processing: true,
            serverSide: true,
            responsive: true,
            deferRender: true,
            columns: columns
        });
    }

    $(document).ready(function() {
        let datatable = createDataTable(
            "dataTable",
            tableUrl,
            [
                {
                    data: "name",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "email",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "actions",
                    orderable: true,
                    searchable: true,
                    className: "text-end"
                },
            ]
        );
    });
</script>
</body>
</html>