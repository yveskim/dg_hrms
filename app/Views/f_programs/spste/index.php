<?= $this->extend('f_layout/home_layout') ?>

<?= $this->section('content') ?>

<style>
#news-header{
  font-family: fantasy;
  color: #020255;

}

.hr-break{
  height: .4rem; 
  background-color: goldenrod;
}

.updates-logo{
  max-width: 30%;
  max-height: 30%;
}

.updates-image{
  max-width: 100%;
  max-height: 100%;
}

.updates-content{
  text-align: justify;
}

.updates-title{
  font-family:sans-serif;
  font-weight: bold;
}

</style>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <strong><h2 id="news-header">SPECIAL PROGRAM IN SCIENCE TECHNOLOGY AND ENGINEERING</h2></strong>
    </div>
  </div>
  <hr class="hr-break">

  <div class="row">
    <div class="col-md-12">
        <h2 class="updates-title">
          SSC is now SPSTE
        </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="updates-content">
      The Special Science Class (SSC), now the Special Program in Science Technology and Engineering (SPSTE) is the first Special Science Class in Western Visayas which was launched at the Iloilo National High School in 1988 to meet the scientific and technological manpower needs of the country. Its  consistent excellent academic performance as the No. 1 Science and Technology Network School of the DOST-SEI Project in the country since its approval  inspired the Department of Education to adopt the Special  Science Class curriculum in the different Regions of the country.

      </p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/spste/brochure_1.jpg" alt="brochiour 1">
        </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/spste/brochure_2.jpg" alt="brochiour 2">
        </div>
    </div>
  </div>
  <hr>
  


</div>





<?= $this->endSection() ?>
