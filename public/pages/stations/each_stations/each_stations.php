<style>
    .station-details{
        border-left: 2px solid lightgray;
    }
</style>

<hr>
<div class="row">
    <div class="col-md-4 station-details">
        <h6 >Station Title: <span class="text-warning" id="station_title"></span></h6>
    </div>
    <div class="col-md-2 station-details">
        <input type="hidden" id="station_id">
        <h6>Station ID: <span class="text-warning" id="_office_id"></span></h6>
    </div>
    <div class="col-md-4 station-details">
        <h6 >Address: <span class="text-warning" id="station_address"></span></h6>
    </div>
    <div class="col-md-2 station-details">
        <h6 >Branch: <span class="text-warning" id="station_branch"></span></h6>
    </div>
</div>
<hr>

<div class="x_content">
    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="station_employees" data-toggle="tab" href="#stationEmpTab" role="tab" aria-controls="home" aria-selected="true">Station Employees</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="station-event" data-toggle="tab" href="#stationEvent" role="tab" aria-controls="contact" aria-selected="false">Stations Events</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="stationEmpTab" role="tabpanel" aria-labelledby="station_employees">
            
        </div>
        <div class="tab-pane" id="stationEvent" role="tabpanel" aria-labelledby="station-event">
        </div>
    </div>
</div>

<script>
$(document).ready(() => {
    $("#stationEmpTab").load(
    "pages/stations/each_stations/employees/station_employees.php"
    );
});


</script>