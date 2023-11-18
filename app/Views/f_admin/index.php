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

  .dashboard-div img{
    height:100%;
    width:100%;
    object-fit: cover;
    display:block;
  }

</style>


<div class="content-div">
  <div class="row dashboard-div">
    <div class="col-md-12" style="background-color: rgb(235, 218, 156);">
        <div style="font-weight: bold; text-align: center; color: white;">
          <h1 class="text-info">Welcome to Schools Division Of <strong>GUIMARAS</strong></h1>
          <h1 class="text-danger"><strong> Human Resource Management System</strong></h1>
        </div>
    </div>
    <img src="upload/system_file/facade.jpg" alt="">
  </div> 
</div>

<script type="text/javascript">


  $(document).ready(function(){
    $('.spiner-div').hide();
    $('.div-blur').hide();
  });


  
</script>


<?php $this->endSection(); ?>