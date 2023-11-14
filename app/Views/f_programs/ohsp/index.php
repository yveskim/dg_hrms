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
      <strong><h2 id="news-header">NASYO ACADEMIC UPDATES</h2></strong>
    </div>
  </div>
  <hr class="hr-break">

  <div class="row">
    <div class="col-md-12">
        <h2 class="updates-title">
          INHS Opens a New Special Program
        </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="updates-content">
        The Republic Act No. 10665 or The Open High School System Act provided the mandate to the 
        Department of Education to create Open High School Program. The law aims to broaden access of 
        Filipino learners to relevant quality education through the employment of an alternative secondary 
        education program that will enable the youth to overcome personal, geographical, socioeconomic, 
        and physical constraints, to encourage them to complete secondary education.
        The Iloilo National High School is known for its “Schools-Within-A-School” 
        Program which gives Filipino learners opportunities to appreciate their existence and discover 
        themselves by providing different curricular offerings that hone their potential in the best way possible. 
        This is our way of answering the national call for “no learner is left behind” and the global call for 
        “Education for All”.
      </p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/ohsp/brochiour_1.png" alt="brochiour 1">
        </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/ohsp/brochiour_2.png" alt="brochiour 2">
        </div>
    </div>
  </div>
  <hr>
  


</div>





<?= $this->endSection() ?>
