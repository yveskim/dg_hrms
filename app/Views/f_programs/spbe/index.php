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
      <strong><h2 id="news-header">SPECIAL PROGRAM IN BUSINESS AND ENTREPRENEURSHIP</h2></strong>
    </div>
  </div>
  <hr class="hr-break">

  <div class="row">
    <div class="col-md-12">
        <h2 class="updates-title">
          Smart Schools in Entrepreneurship (SSE) is now Special Program in Business and Entrepreneurship (SPBE)
        </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="updates-content">
        SPBE is a blended entrepreneurship class that follows the DepEd curriculum for Junior High School with eight core learning areas as specified in DepEd Order No.21,s. 2019. It is enhanced by the addition of two (2) specialized subjects on Entrepreneurship and balanced by the learner's presence in school during Science Laboratory and Technology and Livelihood Laboratory works. Learners socialize with their fellow learners during the scheduled MAPEH classes. 

        SPBE is envisioned to be the breeding center of dynamic and young entrepreneurs who develop innovative projects through collaboration in order to provide job opportunities that promote greater economic growth and sustainable nation-building.

      </p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/spbe/Slide1.JPG" alt="brochiour 1">
        </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/spbe/Slide2.JPG" alt="brochiour 2">
        </div>
    </div>
  </div>
  <hr>
  


</div>





<?= $this->endSection() ?>
