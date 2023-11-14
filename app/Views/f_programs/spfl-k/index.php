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
      <strong><h2 id="news-header">SPECIAL PROGRAM IN FOREIGN LANGUAGE - KOREAN</h2></strong>
    </div>
  </div>
  <hr class="hr-break">

  <div class="row">
    <div class="col-md-12">
        <h2 class="updates-title">
          INHS Opens New Program
        </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="updates-content">
        Foreign Language completes the ‘one-stop-shop’ of Iloilo NHS
      </p>
      <p>
        SPFL is designed to equip graduates of secondary education for meaningful interaction in a linguistically and culturally diverse global community. It helps prepare learners for a career, for higher education, or for entrepreneurship. It provides a lifelong learning opportunities for them through the implementation of this program.
      </p>
      <p>
        SPFL-Korean aims to enhance capacities of students to develop skills in listening, reading, writing, speaking, and viewing as fundamental to acquiring communicative competence in a second foreign language, to be prepared for meaningful interaction in a linguistically and culturally diverse global venue and enhance understanding and appreciation of other people’s cultures.
      </p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/spfl-k/spfl borchure.jpg" alt="brochiour 1">
        </div>
    </div>
  </div>
  <hr>
  <!-- <div class="row">
    <div class="col-md-12">
        <div class="">
          <img class="updates-image"  src="upload/programs/spste/brochure_2.jpg" alt="brochiour 2">
        </div>
    </div>
  </div> -->
  <hr>
  


</div>





<?= $this->endSection() ?>
