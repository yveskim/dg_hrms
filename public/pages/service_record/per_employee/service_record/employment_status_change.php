<div class="row">
    <div class="col-md-12 bg-success pt-2 text-light">
        <h5>Change Employment Status</h5>
    </div>
</div>
<hr>
<form id="appointmentStatusForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_current_service_end">Date Current Service End</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_current_service_end" id="date_current_service_end" form="appointmentStatusForm" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_started">Date New Service Start</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_started" id="date_started" form="appointmentStatusForm" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="app_status">Appointment Status</label>
                <select class="form-control form-control-sm full-size" name="app_status" id="app_status" form="appointmentStatusForm" required>
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
            <div class="col-md-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="appointmentStatusForm">
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

                if(data.st == null){
                    $('#app_status').val("");
                }else{
                    $('#app_status').val(data.st.sr_status);
                }
                    
            
            }
        })
    })


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    
$('#appointmentStatusForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    let emp_id_ref = $('#emp_id_ref').val();
    
    formData.append("user_id", $("#user").val());
    formData.append("emp_id", emp_id_ref);

    $.ajax({
        url: "service/appointmentStatus",
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
                $("#modalNewServiceRecord").hide();
                $('.modal-backdrop').remove();
                // $("#modalUpdateServiceRecord").modal("toggle");
                $("#appointmentStatusForm")[0].reset();
                loadeEmpServiceRecord($('#emp_id_ref').val());
            }else if(res.status == 3){
                Swal.fire({
                position: "center",
                icon: "info",
                title: "Status failed to change.",
                text: res.message,
                showConfirmButton: true,
                });
            }else {
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