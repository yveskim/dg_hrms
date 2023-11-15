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

</style>


<div class="content-div" >
   <div class="row">
    <div class="col-md-12 bg-warning" style="font-weight: bold; text-align: center;">
      <h1>Welcome to Schools Division Office <strong class="text-info">GUIMARAS</strong> Human Resource Management System</h1>
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