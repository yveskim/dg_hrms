<?= $this->extend('f_layout/home_layout') ?>

<?= $this->section('content') ?>

<style media="screen">

  .div-main{
    background-color: white;
    padding: 4%;
    margin: 0 10% 0 10%;
    min-height: 800px;
    overflow: hidden;
    border-radius: 2em;
    background: rgba(0, 0, 0, 0.5);
  }

  .btn-menu{
    height: 5em;
    width: 100%;
    padding: 5%;
  }
</style>

 <div class="div-main">
 </div>


 <script type="text/javascript">
   $(document).ready(function(){
     //$('.div-main').load('pages/admission/verification_page.php');
     $('.div-main').load('pages/registrar/registrar_page.php');

   });
 </script>


<?= $this->endSection() ?>
