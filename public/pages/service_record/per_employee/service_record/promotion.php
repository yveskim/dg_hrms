<div class="row">
    <div class="col-md-12 bg-warning pt-2 text-dark">
        <h5>Promotion</h5>
    </div>
</div>
<hr>
<form id="promotionServiceRecordForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_current_record_end">Date Current Service End</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_current_record_end" id="date_current_record_end" form="promotionServiceRecordForm" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_started">Date New Service Start</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_started" id="date_started" form="promotionServiceRecordForm" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="pantilla_id" id="pantilla_id" form="promotionServiceRecordForm">
                <label for="pantilla_no">New Plantilla Item no.</label>
                <div class="input-group">
                <input type="text" readonly class="form-control form-control-sm" name="pantilla_no" id="pantilla_no" form="promotionServiceRecordForm" required>
                <div class="input-group-append">
                    <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#getPlantillaModal">Select</button>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="promotionServiceRecordForm">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <button type="button" class="btn btn-secondary full-size" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success full-size" >Submit</button>
            </div>
        </div>
    </div>
</form>

<!-- TODO: show plantilla -->

<div class="modal fade mb-4" id="getPlantillaModal">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Select Plantilla</h4>
                <button type="button" class="close_plantilla_modal" >&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <table class="table table-bordered table-hover table-plantilla table-sm full-size" style=" white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th>-</th>
                                    <th>status</th>
                                    <th>Plantilla No</th>
                                    <th>Position</th>
                                    <th>Salary Grade</th>
                                    <th>Date Recieved</th>
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
    $(document).ready(function(){
        let emp_id = $('#emp_id_ref').val();
        $.ajax({
            url: "service/getNewServiceRecordDetails",
            method: "get",
            dataType: "json",
            data: {emp_id: emp_id},
            beforeSend: function () {
                $(".spiner-div").show();
                $(".div-blur").show();
            },
            complete: function () {
                $(".spiner-div").hide();
                $(".div-blur").hide();
            },
            success: function (data) {
                // $('#pantilla_no').append('<option value="">-</option>');
                // $.each(data.plant, function (key, val){
                //     $('#pantilla_no').append('<option value="'+val.plantilla_id+'">'+val.plantilla_item_no+ "-"+val.position_title+'</option>');
                // })

                $('#nbc_ref').append('<option value="">-</option>');
                $.each(data.nbc, function (key, val){
                    $('#nbc_ref').append('<option value="'+val.nbc_id+'">'+val.nbc_no+'</option>');
                })

                if(data.st == null){
                    $('#current_station').val("");
                    $('#branch').val("");
                }else{
                    $('#current_station').val(data.st.st_title);
                    $('#branch').val(data.st.st_branch);
                }
                    
            
            }
        })
    })

$('#getPlantillaModal').on('show.bs.modal', function(){
    $(this).addClass('modal-backdrop-blur');
    $.ajax({
        url: "plantilla/getPlantilla",
        method: "get",
        dataType: "json",
        beforeSend: function () {
            $(".spiner-div").show();
            $(".div-blur").show();
        },
        complete: function () {
            $(".spiner-div").hide();
            $(".div-blur").hide();
        },
        success: function (data) {
            $(".table-plantilla").off();
            $(".table-plantilla").DataTable().clear().destroy();
            $(".table-plantilla").DataTable({
                data: data.plant,
                responsive: false,
                scrollX: true,
                autoWidth: false,
                destroy: true,
                searching: true,
                paging: false,
                columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        if(data.is_assigned == true){
                            return '<div class="bg-warning full-size text-center text-light" style="padding: .1rem; width: 100%">occupied</div>';
                        }else{
                            return '<div class="bg-success full-size text-center text-light" style="padding: .1rem; width: 100%">vacant</div>';
                        }
                    
                    
                    },
                },
                { data: "plantilla_item_no" },
                { data: "position_title" },
                { data: "salary_grade" },
                { data: "date_recieved" },
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        if(data.is_assigned == false){
                            return (
                                "<button type='button' class='btn btn-sm btn-success full-size _set' name='st_id' " +
                                "id='" +
                                data.plantilla_id +
                                "'>Set</button>"
                            );
                        }else{
                            return '<span class="text-danger">not available</span>';
                        }
                    
                    },
                },
                ],
            }); //end of datatable
            $(".table-plantilla").on("click", "._set", function () {
                $("#getPlantillaModal").modal("toggle");
                let plantilla_id = $(this).prop("id");
                $.ajax({
                    url: "plantilla/getPlantillaDetails",
                    method: "get",
                    dataType: "json",
                    data: {plantilla_id: plantilla_id},
                    success: function (data) {
                        $('#pantilla_id').val(data.plant.plantilla_id);
                        $('#pantilla_no').val(data.plant.plantilla_item_no +" - "+ data.plant.position_title);
                    }
                })
                
            });
        }
    })
})

$('#getPlantillaModal').on('shown.bs.modal', function (e) {
    setInterval(function () {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    }, -100000);
});

$('.close_plantilla_modal').click(function(){
    $('#getPlantillaModal').modal('toggle');
})
    
$('#promotionServiceRecordForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    let emp_id_ref = $('#emp_id_ref').val();
    formData.append("user_id", $("#user").val());
    formData.append("emp_id", emp_id_ref);

    $.ajax({
        url: "service/promotionServiceRecord",
        method: "post",
        dataType: "json",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $(".spiner-div").show();
            $(".div-blur").show();
        },
        success: function (res) {
            console.log(res);
            if (res.status == 1) {
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Process Successfull",
                text: "Date Successfully Updated",
                showConfirmButton: true,
                });
                // $("#modalNewServiceRecord").hide();
                // $('.modal-backdrop').remove();
                // $("#modalUpdateServiceRecord").modal("toggle");
                $("#modalNewServiceRecord").modal("toggle");
                $("#promotionServiceRecordForm")[0].reset();
                loadeEmpServiceRecord($('#emp_id_ref').val());
            } else {
                Swal.fire({
                position: "center",
                icon: "error",
                title: "Action Failed",
                text: res.message,
                showConfirmButton: true,
                });
            } //end ifelse
        },
        complete: function () {
        $(".spiner-div").hide();
        $(".div-blur").hide();
        },
    });

})


</script>