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
    height:80vh;
    width:100vw;
   object-fit: cover;
   display:block;
  }

</style>


<div class="content-div">
  <div class="row dashboard-div">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12 bg-warning " style="font-weight: bold; text-align: center;">
          <h1>Welcome to Schools Division Of <strong class="text-info">GUIMARAS</strong></h1>
          <h3> Human Resource Management System</h3>
        </div>
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