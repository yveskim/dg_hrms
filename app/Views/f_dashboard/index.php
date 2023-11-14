<?php $this->extend("f_layout/default_layout") ?>

<?php $this->section('title') ?> INHS Online <?php $this->endSection() ?>



<?php $this->section('content') ?>

    <div id="content-wrapper" class="content-inner h-100" style="overflow-y: auto"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
    //    $('#content-wrapper').load('pages/dashboard/v_dashboard.php');

        $('#btn-dashboard').click(function(){
          $('#content-wrapper').load('pages/dashboard/v_dashboard.php');
        });


        $('#btn-profile').click(function(){
          $('#content-wrapper').load('pages/student/v_profile.php');
        });
      });
    </script>


<?php $this->endSection() ?>
