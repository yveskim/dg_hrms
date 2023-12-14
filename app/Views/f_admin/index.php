<?php $this->extend("f_layout/admin_layout") ?>

<?php $this->Section('content') ?>
<style media="screen">
  .content-div {
    margin-top: 2%;
    /* padding: 2%; */
  }


  .faded {
    opacity: .9;
  }

  .content-div{
    background-image: url('upload/system_file/facade.jpg');
    background-repeat: no-repeat;
    background-size: cover !important;
    height:800px;
    width:100%;
    object-fit: cover;
    display:block;
    position: inherit !important;
  }



</style>


<div class="content-div">
  <div class="row dashboard-div mb-4">
    <div class="col-md-12" style="background-color: rgb(235, 218, 156, .7);">
        <div style="font-weight: bold; text-align: center; color: white;">
          <h1 class="text-info">Welcome to Schools Division Of <strong>GUIMARAS</strong></h1>
          <h1 class="text-danger"><strong> Human Resource Management System</strong></h1>
        </div>
    </div>
  </div> 

  <div class="row" >
    <div class="col-md-6">
      <div class="card text-light" style="background-color: rgb(0,0,0, .8)">
        <div class="card-header">
          <h6>Teachers Available for Step Increase</h6>
        </div>
        <div class="card-body" style="overflow-x: scroll">
            <table class="table table-bordered table-stripped table-hover table-employee full-size table-dark" style="white-space: nowrap;">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Sur Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Yrs. in Service</th>
                  <th>Plantilla Item</th>
                  <th>Current Step</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-light" style="background-color: rgb(0,0,0, .8)">
        <div class="card-header">
          <h6>Vacant Position</h6>
        </div>
        <div class="card-body" style="overflow-x: scroll">
            <table class="table table-bordered table-stripped table-hover table-employee full-size table-dark" style="white-space: nowrap;">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Plantilla Item No</th>
                  <th>Position</th>
                  <th>SG</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <div class="row" >
    <div class="col-md-6">
      <div class="card text-light" style="background-color: rgb(0,0,0, .8)">
        <div class="card-header">
          <h6>5 Years Loyalty Awardee</h6>
        </div>
        <div class="card-body" style="overflow-x: scroll">
            <table class="table table-bordered table-stripped table-hover table-employee full-size table-dark" style="white-space: nowrap;">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Sur Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Yrs. in Service</th>
                  <th>Plantilla Item</th>
                  <th>Current Step</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card text-light" style="background-color: rgb(0,0,0, .8)">
        <div class="card-header">
          <h6>10 Years Loyalty Awardee</h6>
        </div>
        <div class="card-body" style="overflow-x: scroll">
            <table class="table table-bordered table-stripped table-hover table-employee full-size table-dark" style="white-space: nowrap;">
              <thead>
                <tr>
                  <th>-</th>
                  <th>Plantilla Item No</th>
                  <th>Position</th>
                  <th>SG</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                  <td>sdfsdf</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>


</div>

<script type="text/javascript">


  $(document).ready(function(){
    $('.spiner-div').hide();
    $('.div-blur').hide();
  });


  
</script>


<?php $this->endSection(); ?>