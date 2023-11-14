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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script src="assets/jquery/jquery3.5.1.js"></script> -->

<div class="content-div">
      <div class="row mb-4">
        <div class="col-lg-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Total Students per Grade Level</h2>
              <ul class="nav navbar-right panel_toolbox">
              </ul>
              <div class="clearfix"></div>
            </div>
              <div class="x_content">
                <div class="col-md-12 col-sm-12 ">
                  <div id="enrollees_chart"  style="height: 250px;"></div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Total Student in Regular Class (JHS)</h2>
              <ul class="nav navbar-right panel_toolbox">
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 ">
                <div id="bar_chart_regular"  style="height: 250px;"></div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row mb-4">
      <div class="col-lg-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Total Students in Special Program (JHS)</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 ">
                <div id="bar_chart_program"  style="height: 250px;"></div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row mb-4">
    <div class="col-lg-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Total Students per Track (Grade 11)</h2>
              <ul class="nav navbar-right panel_toolbox">
              <!-- <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li> -->
              <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-12 col-sm-12 ">
                <div id="bar_chart_strand_11"  style="height: 250px;"></div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-lg-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Total Students per Track (Grade 12)</h2>
            <ul class="nav navbar-right panel_toolbox">
            <!-- <li>
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li> -->
            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li> -->
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 ">
              <div id="bar_chart_strand_12"  style="height: 250px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  $(window).load(function() {
    $('.spiner-div').hide();
    $('.div-blur').hide();
  });


  $(document).ready(function(){
    loadChartPerGrade();
    loadStrandChart11();
    loadStrandChart12();
    loadProgramChartPerGrade();
    loadProgramChartRegular();
  });

  function loadChartPerGrade(){

    new  Morris.Bar({
      // ID of the element in which to draw the chart.
      <?php
        $chart_data = "";
        foreach ($enrollees as $e) {
          $chart_data .= "{ grade_level:'"."grade ".$e["grade_level"]."', total:'".$e["total"]."'}, ";
        }
        // echo $chart_data;
       ?>
      element: 'enrollees_chart',
      data:[<?php echo $chart_data; ?>],
      xkey:'grade_level',
      ykeys:['total'],
      labels:['Total'],
      barRatio: 0.4,
      barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
      xLabelAngle: 60,
      hideHover: 'auto',
      resize: true

    });
  }

  function loadProgramChartPerGrade(){
      new Morris.Bar({
          <?php
            $chart_data = "";
            foreach ($prog_per_grade as $e) {
              $chart_data .= "{ program_title:'".$e["program_title"]."', g7:'".$e["g7"]."', g7_male:'".$e["g7_male"]."', g7_female:'".$e["g7_female"]."', g8:'".$e["g8"]."', g8_male:'".$e["g8_male"]."', g8_female:'".$e["g8_female"]."', g9:'".$e["g9"]."', g9_male:'".$e["g9_male"]."', g9_female:'".$e["g9_female"]."', g10:'".$e["g10"]."', g10_male:'".$e["g10_male"]."', g10_female:'".$e["g10_female"]."', total:'".$e["total"]."'}, ";
            }
          ?>
          element: 'bar_chart_program',
          data:[<?php echo $chart_data; ?>],
          xkey: 'program_title',
          ykeys: ['g7_male', 'g7_female', 'g8_male', 'g8_female', 'g9_male', 'g9_female', 'g10_male', 'g10_female', 'total'],
          barColors: [ 'brown', 'brown',  'blue', 'blue', 'orange', 'orange', 'green', 'green', 'violet'],
          hideHover: 'auto',
          xLabelAngle: 60,
          labels: ['G7_M', 'G7_F', 'G8_M', 'G8_F', 'G9_M', 'G9_F', 'G10_M', 'G10_F', 'Overall'],
          resize: true
      });
  }

  function loadProgramChartRegular(){
      new Morris.Bar({
          <?php
            $chart_data = "";
            foreach ($prog_regular as $e) {
              $chart_data .= "{ program_title:'".$e["program_title"]."', g7:'".$e["g7"]."', g7_male:'".$e["g7_male"]."', g7_female:'".$e["g7_female"]."', g8:'".$e["g8"]."', g8_male:'".$e["g8_male"]."', g8_female:'".$e["g8_female"]."', g9:'".$e["g9"]."', g9_male:'".$e["g9_male"]."', g9_female:'".$e["g9_female"]."', g10:'".$e["g10"]."', g10_male:'".$e["g10_male"]."', g10_female:'".$e["g10_female"]."', total:'".$e["total"]."'}, ";
            }
          ?>
          element: 'bar_chart_regular',
          data:[<?php echo $chart_data; ?>],
          xkey: 'program_title',
          ykeys: ['g7_male', 'g7_female', 'g8_male', 'g8_female', 'g9_male', 'g9_female', 'g10_male', 'g10_female', 'total'],
          barColors: ['brown', 'brown',  'blue', 'blue', 'orange', 'orange', 'green', 'green', 'violet'],
          hideHover: 'auto',
          xLabelAngle: 60,
           labels: ['G7_M', 'G7_F', 'G8_M', 'G8_F', 'G9_M', 'G9_F', 'G10_M', 'G10_F', 'Overall'],
          resize: true
      });
  }

  function loadStrandChart11(){
      new Morris.Bar({
          <?php
            $chart_data = "";
            foreach ($per_strand_11 as $e) {
              $chart_data .= "{ strand_title:'".$e["strand_title"]."', male:'".$e["male"]."', female:'".$e["female"]."'}, ";
            }
          ?>
            element: 'bar_chart_strand_11',
            data:[<?php echo $chart_data; ?>],
            xkey: 'strand_title',
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            ykeys: ['male', 'female'],
            labels: ['Male', 'Female'],
            hideHover: 'auto',
            xLabelAngle: 60,
            resize: true
      });
  }

  function loadStrandChart12(){
      new Morris.Bar({
          <?php
            $chart_data = "";
            foreach ($per_strand_12 as $e) {
              $chart_data .= "{ strand_title:'".$e["strand_title"]."', male:'".$e["male"]."', female:'".$e["female"]."'}, ";
            }
          ?>
            element: 'bar_chart_strand_12',
            data:[<?php echo $chart_data; ?>],
            xkey: 'strand_title',
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            ykeys: ['male', 'female'],
            labels: ['Male', 'Female'],
            hideHover: 'auto',
            xLabelAngle: 60,
            resize: true
      });
  }

</script>


<?php $this->endSection(); ?>