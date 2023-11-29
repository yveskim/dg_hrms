<div class="card">
    <div class="card-header">
        <h4>Service Record Master</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 nbc-content-div">
                <div class="row bg-dark" style="padding-top: .5vw; padding-bottom: .1rem;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 mb-1">
                                <button class="btn btn-success btn-sm full-size fs-1 btn-large" id="loadAll">Load All Data</button>
                            </div>
                            <div class="col-md-2 mb-1">
                                <button class="btn btn-primary btn-sm full-size fs-1 btn-large" id="chooseEmp">Choose Employee</button>
                            </div>
                            <div class="col-md-2 mb-1">
                                <button class="btn btn-warning btn-sm full-size fs-1 btn-large" id="generateReport">Generate Report</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid" id="data-div">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $('#loadAll').click(function(){
        $('#data-div').load('pages/service_record/all_data/service_record_all.php', function(){

        })
    })
</script>