$(document).ready(function () {
  $("#allStations").load("pages/stations/all_stations/all_stations.php");
});


$('#employee-stations').click(function () {
  $("#employeeStation").load("pages/stations/employee_station/emp_stations.php");
})
