<div class="row bg-success text-light" style="padding-top: .4rem">
    <div class="col-md-12">
        <h4>Promotion Form</h4>
    </div>
</div>
<hr>
<form id="promotionForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_end_previous">Date End Previous Item</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_end_previous" id="date_end_previous" form="promotionForm">
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_start_new_item">Date Start New Item</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_start_new_item" id="date_start_new_item" form="promotionForm">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="pantilla_no">Plantilla Item no.</label>
                <select class="form-control form-control-sm full-size" name="pantilla_no" id="pantilla_no" form="promotionForm">
                        
                </select>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12 mb-4">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="promotionForm">
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
                    $('#pantilla_no').append('<option value="'+val.plantilla_id+'">'+val.plantilla_item_no+ "-"+val.position_title+'</option>');
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


    
$('#promotionForm').submit(function(event){
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
                $("#promotionForm")[0].reset();
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