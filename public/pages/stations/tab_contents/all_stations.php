<hr>


<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalStation"><i class="fa fa-plus"></i>&nbsp;Add Station</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-stations full-size table-sm" style="width: 100%; white-space: nowrap;">
                    <thead class="bg-info">
                        <tr>
                            <th width="5%"></th>
                            <th width="5%">Edit</th>
                            <th>Station Title/ Office</th>
                            <th>Office ID</th>
                            <th>Address</th>
                            <th>Branch</th>
                            <th width="5%">Del</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade mb-4" id="modalStation">
    <div class="modal-dialog modal-md  modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Add New Station <span class="form-type text-warning"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <!-- ----------------------------- -->
          <form id="stationForm">
            <div class="row mb-2">
                <input type="hidden" value="0" name="is_edit" id="is_edit">
                <input type="hidden" name="station_id" id="station_id">
                <div class="col-md-8 mb-2">
                    <label for="st_title" class="form-label">Station Title</label>
                    <input type="text" class="form-control form-control-sm" id="st_title" name="st_title" form="stationForm">
                </div>
                <div class="col-md-4 mb-2">
                    <label for="st_id" class="form-label">Station ID</label>
                    <input type="text" class="form-control form-control-sm" id="st_id" name="st_id" form="stationForm">
                </div>
            </div>
            <div class="row mb-2">
                 <div class="col-md-12 mb-2">
                    <label for="st_address" class="form-label">Address</label>
                    <input type="text"  class="form-control form-control-sm" id="st_address" name="st_address" form="stationForm">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="st_branch" class="form-label">Branch Type</label>
                    <select class="form-control form-control-sm" name="st_branch" id="st_branch" form="stationForm">
                        <option value=""></option>
                        <option value="Local">Local</option>
                        <option value="National">National</option>
                    </select>
                </div>
            </div>
         
            <hr class="bg-success">
            <br>
            <div class="row mb-2">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success full-size" form="stationForm">SUBMIT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="pages/stations/tab_contents/all_stations.js"></script>