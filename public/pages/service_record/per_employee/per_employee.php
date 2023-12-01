
<div class="row">
    <div class="col-md-2">
        <button class="btn btn-info" data-toggle="modal" data-target="#modalChooseEmp">Select Employee</button>
    </div>
</div>




<div class="modal fade mb-4" id="modalChooseEmp">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Select Employee</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" >
                <div class="row">
                    <div class="col-md">
                        <table class="table table-bordered table-hover table-choose-emp table-sm full-size" style=" white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th>-</th>
                                    <th>Emp ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                  


<script>
    
    $('#modalChooseEmp').on('show.bs.modal', function(e){
        // $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();//align table header
        $.ajax({
            url: "service/selectEmployeeSr",
            method: "get",
            dataType: "json",
            beforeSend: function () {
            $(".spiner-div").show();
            $(".div-blur").show();
            },
            success: function (data) {
            $(".table-choose-emp").off();
            $(".table-choose-emp").DataTable().clear().destroy();
            $(".table-choose-emp").DataTable({
                data: data.emp,
                responsive: false,
                scrollX: true,
                autoWidth: false,
                destroy: true,
                searching: true,
                paging: true,
                columns: [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    { data: "emp_agency_employee_no" },
                    { data: "emp_lname" },
                    { data: "emp_fname" },
                    { data: "emp_mname" },
                    { data: "emp_gender" },
                    {
                        data: null,
                        render: function (data, type, row) {
                        return (
                            '<div class="display-block"><button type="button" id="' +
                                data.emp_id +
                            '" class="btn btn-success btn-sm btn-xs _select" title="edit entry"><i class="fa fa-edit"></i>&nbsp;Edit</button>'
                        );
                        },
                    },
                ],
            }); //end of datatable
            },
            complete: function () {
            $(".spiner-div").hide();
            $(".div-blur").hide();
            },
        });

        let table = $(".table-choose-emp").DataTable();
        table.columns.adjust().draw();
        
    })
</script>