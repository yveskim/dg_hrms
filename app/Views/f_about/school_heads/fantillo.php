



  <?= $this->extend('f_layout/home_layout') ?>

  <?= $this->section('content') ?>

  <style media="screen">

    .div-main{
      /* background-color: gray; */
      /* padding-top: 3%; */
      margin: 0 5% 0 5%;
      min-height: auto;
      overflow: hidden;
      /* border-radius: 4em; */
      color: white;
      /* padding-bottom: 4em; */
      font-family: sans-serif;
    }

    .page_title{
      background-color: darkblue;
      color: white;
      /* padding: 2%; */
      /* border-radius: 0 4rem 4rem 0; */
      padding: .5rem 0 .5rem 2em;
      
    }

    .info-div{
      /* padding: 0 5% 0 5%; */
    }

    .profile-div img{
      width: 100%;
      height: auto;
      border: 1vw solid darkblue;
    }

    .profile-border{
      height: 2vw;
      position: relative;
      background: darkblue;
      /* padding: 3px; */
      width: 100%;
    }

    .fantillo-cv{
      text-align: justify;
      font-size: 1.2vw;
    }

  </style>


  <div class="div-main">
    <div class="row">
      <div class="col-md-12 page_title">
        <h2>OFFICE OF THE PRINCIPAL</h2>
      </div>
    </div>
    <br>
    <div class="row info-div">
      <div class="col-md-5 profile-div">
        <img src="upload/system_file/maam f.jpg" alt="fantillo_img">
        <div class="text-center" style="background-color: darkblue; padding: 1rem; width: 100%;">
          <h5 style="font-family: sans-serif; font-weight: bold; font-size: 1.5vw;">DELORAH CECILIA L. FANTILLO</h5>
          <h6 style="text-decoration: none; font-weight: normal;"><i>School Principal IV</i></h6>
        </div>
      </div>
      <div class="col-md-7" style="color: black; font-size: 1vw; width: 100%;">
        <center><h4>Principal's Bio</h4></center>
        <hr>
        <p class="fantillo-cv">
          <strong>Delorah Cecilia L. Fantillo</strong>
          has fostered compassionate leadership in education which nurtured learners and teachers with a holistic approach to achieving academic excellence. 
          Mrs. Fantillo has humble beginnings in Lambunao, Iloilo graduating from Malte Grande Elementary School and Lambunao Institute of Science & Technology.  
          She earned a degree Bachelor of Science Education from the University of Iloilo. 
          In her pursuit of lifelong learning, she also took graduate program degrees, Master in Psychology and Guidance and Education Management, 
          at the University of San Agustin and Philippine Christian University respectively.
        </p>
        <br>
        <p class="fantillo-cv">
            Before she became the Principal IV of Iloilo National High School, she served as a school head to various secondary schools under the 
            Schools Division of Iloilo Province such as the Pavia National High School, Dumangas National High School, 
            PD Monfort National High School, and Carvasana National High School. Her experiences from being a classroom teacher, master teacher, 
            and head teacher have shaped her purpose in reaching out to the learners and establishing an inclusive education for all. 
            This has allowed her to inspire many wherein she has become a facilitator, resource speaker, and mentor in both local and 
            national conferences and workshops in education, leadership, and strategic policy. She was recognized by the Department of Education 
            as the Most Outstanding Secondary School Head in the Schools Division of Iloilo and in Western Visayas. She was also hailed as a 
            National Awardee of the Brigada Eskwela Awards. 
        </p>
        <br>
        <p class="fantillo-cv">
            She is a loving wife to her late husband and former principal Mr. Juel and a proud mother of Jude, Peter, and Ralph who are now successful
            professionals. 
        </p>


      </div>

    </div>
    <div class="row">
      <div class="col-md-12 profile-border"></div>
    </div>
    <!-- <div class="row">
      <div class="col-md-12 text-center" style="background-color: darkblue;">
        <h4>DELORAH CECILIA L. FANTILLO</h4>
        <h6><i>OIC School Principal IV</i></h6>
      </div>
    </div> -->
  </div>


  <?= $this->endSection() ?>
