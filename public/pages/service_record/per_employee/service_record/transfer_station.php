<div class="row">
    <div class="col-md-12 bg-warning pt-2 text-dark">
        <h5>Transfer Station</h5>
    </div>
</div>
<hr>
<form id="transferStationForm">
    <div class="row">
            <div class="col-md-6 mb-4">
                <label for="date_current_service_end">Date Current Service End</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_current_service_end" id="date_current_service_end" form="transferStationForm" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="date_started">Date New Service Started</label>
                <input type="date" class="form-control form-control-sm full-size" name="date_started" id="date_started" form="transferStationForm" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="station_id" id="station_id_ref" form="transferStationForm">
                <label for="_station">New Station</label>
                <div class="input-group">
                <input type="text" readonly class="form-control form-control-sm" name="_station" id="_station" form="transferStationForm" required>
                <div class="input-group-append">
                    <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#getStationsModal">Select</button>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control form-control-sm full-size" name="remarks" id="remarks" form="transferStationForm">
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

<!-- TODO: show stations -->

<div class="modal fade mb-4" id="getStationsModal">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Select Station</h4>
                <button type="button" class="close_station_modal" >&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <table class="table table-bordered table-hover table_stations table-sm full-size" style=" white-space: nowrap;">
                            <thead class="bg-info">
                                <tr>
                                    <th>-</th>
                                    <th>Station Title</th>
                                    <th>Station ID</th>
                                    <th>Address</th>
                                    <th>Branch</th>
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

    // ++++++++++++++++++++++++++++++++++++++++++++++++++



    $('#getStationsModal').on('show.bs.modal', function(){
    $(this).addClass('modal-backdrop-blur');
    $.ajax({
        url: "station/getStations",
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
            $(".table_stations").off();
            $(".table_stations").DataTable().clear().destroy();
            $(".table_stations").DataTable({
                data: data.st,
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
                { data: "st_title" },
                { data: "st_office_id" },
                { data: "st_office_address" },
                { data: "st_branch" },
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return "<button type='button' class='btn btn-sm btn-success full-size set_station' name='st_id' " +
                            "id='" +
                            data.station_id +
                            "'>Set</button>";
                    },
                },
                ],
            }); //end of datatable
            $(".table_stations").on("click", ".set_station", function () {
                $("#getStationsModal").modal("toggle");
                let station_id = $(this).prop("id");
                $.ajax({
                    url: "station/getStationDetails",
                    method: "get",
                    dataType: "json",
                    data: {station_id: station_id},
                    success: function (data) {
                        console.log(data);
                        $('#station_id_ref').val(data.st.station_id);
                        $('#_station').val(data.st.st_title +" - "+ data.st.st_office_id);
                    }
                })
                
            });
        }
    })
})

$('#getStationsModal').on('shown.bs.modal', function (e) {
    setInterval(function () {
        $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
    }, -100000);
    
});

$('.close_station_modal').click(function(){
    $('#getStationsModal').modal('toggle');
})


//  +++++++++++++++++++++++++++++++++++++++++++++++
    
$('#transferStationForm').submit(function(event){
    event.preventDefault();
    let formData = new FormData(this);
    let emp_id_ref = $('#emp_id_ref').val();
    let station_id = $('#station_id_ref').val();
    formData.append("user_id", $("#user").val());
    formData.append("emp_id", emp_id_ref);
    formData.append("station_id", station_id);

    $.ajax({
        url: "service/transferServiceRecord",
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
                $("#transferStationForm")[0].reset();
                loadeEmpServiceRecord($('#emp_id_ref').val());
            } else {
                Swal.fire({
                position: "center",
                icon: "error",
                title: "Station failed to change",
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