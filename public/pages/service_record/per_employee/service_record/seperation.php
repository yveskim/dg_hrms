<div class="row">
    <div class="col-md-12 bg-success pt-2 text-light">
        <h5>Seperation Form</h5>
    </div>
</div>
<hr>
<form id="seperationForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="seperation_type">Seperation Type</label>
                <select class="form-control form-control-sm full-size" name="seperation_type" id="seperation_type" form="seperationForm" required>
                    <option value=""></option>
                    <option value="Retirement">Retirement</option>
                    <option value="End Contract">End Contract</option>
                    <option value="Dismissed">Dismissed</option>
                    <option value="Resigned">Resigned</option>
                    <option value="AWOL">AWOL</option>
                </select>
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_current_service_end">Date Current Service End</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_current_service_end" id="date_current_service_end" form="seperationForm" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="seperation_cause">Cause of Seperation</label>
                <input type="text" class="form-control form-control-sm full-size" name="seperation_cause" id="seperation_cause" form="seperationForm" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="seperation_date">Seperation Date</label>
                <input type="date" class="form-control form-control-sm full-size" name="seperation_date" id="seperation_date" form="seperationForm" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="seperationForm" required>
            </div>
        </div>
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
                    $('#new_step').val("");
                }else{
                    $('#new_step').val(data.st.sr_step);
                }
                    
            
            }
        })
    })


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    
$('#seperationForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    let emp_id_ref = $('#emp_id_ref').val();
    
    formData.append("user_id", $("#user").val());
    formData.append("emp_id", emp_id_ref);

    $.ajax({
        url: "service/seperation",
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
                $("#seperationForm")[0].reset();
                loadeEmpServiceRecord($('#emp_id_ref').val());
            }else if(res.status == 3){
                Swal.fire({
                position: "center",
                icon: "info",
                title: "Step failed to change.",
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