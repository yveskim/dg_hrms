
<form id="newServiceRecordForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_started">Date Started</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_started" id="date_started" form="newServiceRecordForm">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="pantilla_no">Plantilla Item no.</label>
                <div class="input-group">
                <input type="text" class="form-control form-control-sm" name="pantilla_no" id="pantilla_no" form="newServiceRecordForm">
                <div class="input-group-append">
                    <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#getPlantillaModal">Select</button>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="app_status">Appointment Status</label>
                <select class="form-control form-control-sm full-size" name="app_status" id="app_status" form="newServiceRecordForm">
                    <option value="">-</option>
                    <option value="permanent">permanent</option>
                    <option value="temporary">temporary</option>
                    <option value="coterminous">coterminous</option>
                    <option value="fixed term">fixed term</option>
                    <option value="contractual">contractual</option>
                    <option value="substitute">substitute</option>
                    <option value="provisional">provisional</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="nbc_ref">NBC No.</label>
                <select class="form-control form-control-sm full-size" name="nbc_ref" id="nbc_ref" form="newServiceRecordForm">
                </select>
            </div>
            <div class="col-md-6">
                <label for="step">Step</label>
                <select class="form-control form-control-sm full-size" name="step" id="step" form="newServiceRecordForm">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="newServiceRecordForm">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-secondary full-size" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-md-6">
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
                                    <th>Plantilla No</th>
                                    <th>Position</th>
                                    <th>Salary Grade</th>
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

})

    
$('#newServiceRecordForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    let transaction_type = $('#transaction_type').val();
    let emp_id_ref = $('#emp_id_ref').val();
    formData.append("user_id", $("#user").val());
    formData.append("transaction_type", transaction_type);
    formData.append("emp_id", emp_id_ref);

    $.ajax({
        url: "service/newServiceRecord",
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
                $("#modalUpdateServiceRecord").modal("toggle");
                $("#newServiceRecordForm")[0].reset();
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