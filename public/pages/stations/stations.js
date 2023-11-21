$(document).ready(function () {
  $("#allStations").load("pages/stations/all_stations/all_stations.php");
});

$("#all-station-tab").click(function () {
  $("#allStations").load("pages/stations/all_stations/all_stations.php");
});
