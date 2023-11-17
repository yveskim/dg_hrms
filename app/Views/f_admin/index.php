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
    background-size:cover;
    width: 100%;
    height: 100%;
    position: absolute;
  }

</style>


<div class="content-div">
   <div class="row">
    <div class="col-md-12 bg-warning " style="font-weight: bold; text-align: center;">
      <h1>Welcome to Schools Division Of <strong class="text-info">GUIMARAS</strong></h1>
      <h3> Human Resource Management System</h3>
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