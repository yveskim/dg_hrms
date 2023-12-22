<div class="row">
    <div class="col-md-12 bg-success pt-2 text-light">
        <h5>New Salary Schedule (NBC)</h5>
    </div>
</div>
<hr>
<form id="newSalaryScheduleForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_current_service_end">Date Current Service End</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_current_service_end" id="date_current_service_end" form="newSalaryScheduleForm" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_started">Date New Service Start</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_started" id="date_started" form="newSalaryScheduleForm" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="nbc_ref">NBC No.</label>
                <select class="form-control form-control-sm full-size" name="nbc_ref" id="nbc_ref" form="newSalaryScheduleForm" required>
                </select>
            </div>
            <div class="col-md-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="newSalaryScheduleForm">
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


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    
$('#newSalaryScheduleForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    let emp_id_ref = $('#emp_id_ref').val();
    
    formData.append("user_id", $("#user").val());
    formData.append("emp_id", emp_id_ref);

    $.ajax({
        url: "service/newSalarySchedule",
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
                $("#newSalaryScheduleForm")[0].reset();
                loadeEmpServiceRecord($('#emp_id_ref').val());
            }else if(res.status == 3){
                Swal.fire({
                position: "center",
                icon: "info",
                title: "Salary Schedule did not change.",
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