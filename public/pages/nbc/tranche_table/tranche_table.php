<style>
    .nbc_details{
        border-left: 2px solid lightgray;
    }
</style>

<hr>
<input type="hidden" id="nbc_id">
<div class="row">
    <div class="col-md-4 nbc_details">
        <h6 >NBC No.: <span class="text-warning" id="nbc_no"></span></h6>
    </div>
    <div class="col-md-2 nbc_details">
        <h6>NBC Title: <span class="text-warning" id="nbc_title"></span></h6>
    </div>
    <div class="col-md-4 nbc_details">
        <h6 >Tranche: <span class="text-warning" id="_tranche"></span></h6>
    </div>
    <div class="col-md-2 nbc_details">
        <h6 >Effectivity Date: <span class="text-warning" id="effectivity_date"></span></h6>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6>Tranche Table</h6>
            </div>
            <div class="card-body">
                
                <div class="row bg-warning">
                    <div class="col-md-3">
                        <select class="form-control full-size" name="" id="btn-sal-grade">
                            <option value="">--Salary Grade--</option>
                            <option value="0">Load All</option>
                            <option value="1">SG 1</option>
                            <option value="2">SG 2</option>
                            <option value="3">SG 3</option>
                            <option value="4">SG 4</option>
                            <option value="5">SG 5</option>
                            <option value="6">SG 6</option>
                            <option value="7">SG 7</option>
                            <option value="8">SG 8</option>
                            <option value="9">SG 9</option>
                            <option value="9">SG 9</option>
                            <option value="10">SG 10</option>
                            <option value="11">SG 11</option>
                            <option value="12">SG 12</option>
                            <option value="13">SG 13</option>
                            <option value="14">SG 14</option>
                            <option value="15">SG 15</option>
                            <option value="16">SG 16</option>
                            <option value="17">SG 17</option>
                            <option value="18">SG 18</option>
                            <option value="19">SG 19</option>
                            <option value="20">SG 20</option>
                            <option value="21">SG 21</option>
                            <option value="22">SG 22</option>
                            <option value="23">SG 23</option>
                            <option value="24">SG 24</option>
                            <option value="25">SG 25</option>
                            <option value="26">SG 26</option>
                            <option value="27">SG 27</option>
                            <option value="28">SG 28</option>
                            <option value="29">SG 29</option>
                            <option value="30">SG 30</option>
                            <option value="31">SG 31</option>
                            <option value="32">SG 32</option>
                            <option value="33">SG 33</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row salary-grade-div">
               
                    <div class="col-md-12">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <button class="btn btn-primary full-size" id="btnAddStep" data-toggle="modal" data-target="#modalAddStep">Add Step</button>
                            </div>
                            <div class="col-md-4"></div>
                            <form id="stepForm"></form>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-danger full-size" id="delStep" form="stepForm">Delete</button>
                            </div>
                        </div>
                        <div class="row mb-2" >
                            <div class="col-md-12">
                                <h5 id="allSGText"></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered table-hover table-tranche table-sm full-size" style=" white-space: nowrap;">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>-</th>
                                            <th>SG</th>
                                            <th>Step</th>
                                            <th>Amount</th>
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
    </div>
</div>


<div class="modal fade mb-4" id="modalAddStep">
    <div class="modal-dialog modal-md  modal-dialog-centered">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
        <h4 class="modal-title">Salary Grade: <span class="sal_grade_det text-warning"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
        <!-- ----------------------------- -->

        <form id="salForm">
            <input type="hidden" id="is_edit" value="0">
            <input type="hidden" id="sal_sched_id">
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <label for="_step" class="form-label">Step</label>
                    <select class="form-control form-control-sm" name="_step" id="_step" form="salForm">
                        <option value=""></option>
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
                <div class="col-md-6 mb-2">
                    <label for="_amount" class="form-label">Amount</label>
                    <input type="number" class="form-control form-control-sm" id="_amount" name="_amount" form="salForm">
                </div>
            </div>
        
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="salForm">ADD/SAVE</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.salary-grade-div').hide();

        setTimeout(function(){
            getNbcDetails();
        }, 10)
    })

    function getNbcDetails(){
        let nbc_id = $('#nbc_id').val();
        $.ajax({
          url: "nbc/viewNbc",
          method: "get",
          dataType: "json",
          data: { nbc_id: nbc_id },
          success: function (data) {
            $("#nbc_no").text(data.nbc.nbc_no);
            $("#nbc_title").text(data.nbc.nbc_title);
            $("#_tranche").text(data.nbc.tranche);
            $("#effectivity_date").text(data.nbc.effectivity_date);
          },
        });
    }

    function loadSalarySchedule(sal_grade_data){
        let nbc_id = $('#nbc_id').val();
        $.ajax({
          url: "nbc/loadSalaryGradeDetails",
          method: "get",
          dataType: "json",
          data: { nbc_id: nbc_id, sal_grade: sal_grade_data },
          success: function (data) {
            // console.log();
            if(sal_grade_data == 0){
                $('#btnAddStep').hide();
                $('#allSGText').text("Salary Grade List (All)");
            }else{
                $('#allSGText').text("");
                $('#btnAddStep').show();
                $('.sal_grade_det').text($('#btn-sal-grade').val());
            }
            $('.salary-grade-div').show();
            $(".table-tranche").off();
            $(".table-tranche").DataTable().clear().destroy();
            $(".table-tranche").DataTable({
                data: data.nbc,
                responsive: false,
                scrollX: true,
                autoWidth: false,
                destroy: true,
                searching: false,
                paging: false,
                columns: [
                {
                    data: null,
                    render: function (data, type, row) {
                    return (
                        '<input type="checkbox" id="' +
                        data.sal_sched_id +
                        '" class="select-step" name="sal_sched_id[]" style="transform: scale(1.5);" form="stepForm">'
                    );
                    },
                },
                { data: "salary_grade" },
                { data: "step" },
                { data: "amount" },
                ],
            }); //end of datatable
                // TODO: Delete steps
            $('#stepForm').submit(function(event){
                event.preventDefault();
                let formData = new FormData(this);
                let steps = new Array();
                $("input[name='sal_sched_id[]']:checked").each(function () {
                    steps.push($(this).prop("id"));
                });

                formData.append("sal_sched_id", steps);
                $.ajax({
                    url: "nbc/deleteSteps",
                    method: "get",
                    dataType: "json",
                    data: formData,
                    beforeSend: function () {
                    $(".spiner-div").show();
                    $(".div-blur").show();
                    },
                    success: function (res) {
                    // console.log(res);
                    if (res.status == 1) {
                        Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Process Successfull",
                        text: "Steps successfully deleted",
                        showConfirmButton: true,
                        });
                        let sal_grade = $(this).val();
                        loadSalarySchedule(sal_grade);
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



            $(".table-tranche").on("change", ".select-step", function () {
                $("tr .select-step").each(function () {
                if (this.checked) {
                    $(this).closest("tr").addClass("bg-warning");
                } else {
                    $(this).closest("tr").removeClass("bg-warning");
                }
                });
            });
                
          },
        });
    }

    $('#btn-sal-grade').change(function(){
        let sal_grade = $(this).val();
        loadSalarySchedule(sal_grade)
    })

    $('#modalAddStep').on('show.bs.modal', function(){
        // console.log('modal open');
        let sal_grade = $('#btn-sal-grade').val();
        let nbc_id = $('#nbc_id').val();
        $.ajax({
          url: "nbc/getExistingStep",
          method: "get",
          dataType: "json",
          data: { sal_grade: sal_grade, nbc_id: nbc_id },
          success: function (data) {
            // console.log(data);
                if(data.steps == null || data.steps == ""){
                   $('#_step').empty().append('<option value=""></option>');
                    for(let i = 1; i<=8; i++){
                        $('#_step').append('<option value="'+i+'">'+i+'</option>');
                    }
                }else{
                    $('#_step').empty().append('<option value=""></option>');
                    for(let i = 1; i<=8; i++){
                        $('#_step').append('<option value="'+i+'">'+i+'</option>');
                    }
                     $.each(data.steps, function(key, val){
                        $('#_step option[value='+val.step+']').each(function(){
                            $(this).remove();
                        })
                    })
                    
                }
            
          },
        });
    })

    $('#salForm').submit(function(event){
        event.preventDefault();
        let sal_grade = $('#btn-sal-grade').val();
        let nbc_id = $('#nbc_id').val();
        let formData = new FormData(this);
        formData.append('sal_grade', sal_grade);
        formData.append('nbc_id', nbc_id);
        $.ajax({
            url: "nbc/setStep",
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
                text: "Record added/changed successfuly",
                showConfirmButton: true,
                });
                $("#modalAddStep").modal("toggle");
                $("#salForm")[0].reset();
                loadSalarySchedule($('#btn-sal-grade').val());
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