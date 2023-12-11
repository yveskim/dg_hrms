<form id="newServiceRecordForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_started">Date Started</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_started" id="date_started" form="newServiceRecordForm">
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_end">Date End</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_end" id="date_end" form="newServiceRecordForm">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="pantilla_no">Plantilla Item no.</label>
                <select class="form-control form-control-sm full-size" name="pantilla_no" id="pantilla_no" form="newServiceRecordForm">
                        
                </select>
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
        <div class="row bg-info text-light" style="padding: .4rem;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Current Station</label>
                        <div class="input-group mb-3">
                            <input type="text" readonly required class="form-control form-control-sm full-size" name="current_station" id="current_station" >
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalUpdateStation">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="branch">Branch</label>
                        <input type="text" readonly required class="form-control form-control-sm full-size" name="branch" id="branch" >
                    </div>
                </div>
                
            </div>
        </div>
        <hr>

        <!-- <div class="row">
            <div class="col-md-12">
                <div class="row mb-4">
                    <div class="col-md-12">
                        Leave of Absence w/o Pay
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="loa_date_from">Date From</label>
                        <input type="date" class="form-control form-control-sm full-size" name="loa_date_from" id="loa_date_from" form="newServiceRecordForm">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="loa_date_to">Date To</label>
                        <input type="date" class="form-control form-control-sm full-size" name="loa_date_to" id="loa_date_to" form="newServiceRecordForm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="loa_total_deduction">Total Deductions</label>
                        <input type="text" class="form-control form-control-sm full-size" name="loa_total_deduction" id="loa_total_deduction" form="newServiceRecordForm">
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <hr>
        <div class="row">
            <div class="col-md-2 mb-4">
                <label for="is_seperated">Seperated</label>
                <select name="is_seperated" id="is_seperated" class="form-control form-control-sm full-size" form="newServiceRecordForm">
                    <option value=""></option>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="col-md-5 mb-4">
                <label for="seperation_cause">Seperation Cause</label>
                <input type="text" class="form-control form-control-sm full-size" name="seperation_cause" id="seperation_cause" form="newServiceRecordForm">
            </div>
            <div class="col-md-5">
                <label for="seperation_date">Seperation Date</label>
                <input type="date" class="form-control form-control-sm full-size" name="seperation_date" id="seperation_date" form="newServiceRecordForm">
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 mb-4">
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
                $('#pantilla_no').append('<option value="">-</option>');
                $.each(data.plant, function (key, val){
                    $('#pantilla_no').append('<option value="'+val.plantilla_id+'">'+val.plantilla_item_no+'</option>');
                })

            
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