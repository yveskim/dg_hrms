<?= $this->extend('f_layout/home_layout') ?>

<?= $this->section('content') ?>

<style media="screen">

  .div-main{
    background-color: white;
    /* padding: 5%; */
    margin: 0 10% 0 10%;
    min-height: 800px;
    overflow: hidden;
    /* border-radius: 2em; */
    font-family: sans-serif;
    font-size: 1.2vw;
  }

  .btn-menu{
    height: auto;
    width: 100%;
    padding: 5%;
  }

    /* .content h2, .content p, .content a {
      font-family: sans-serif;

    } */

    .content{
      background-color: white;
      padding: 5%;
      border-radius: 2em;
        height: auto;
    }

    .menu h2, .menu p{
      overflow-x: auto; /* Use horizontal scroller if needed */
      white-space: pre-wrap; /* css-3 */
      white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
      word-wrap: break-word; /* Internet Explorer 5.5+ */
      white-space : normal;
    }

    .menu a{
      color: white;
      padding: 0;
      width: auto;
      height: auto;
      margin: 0;
    }

    .menu p, .menu h2{
      color: white;
    }

    .menu a:hover{
      color: orange;
    }


    .admission-icon{
      font-size: 15em;
    }

    .link-btn h2{
      position: relative;
      top: 0;
      margin-bottom: 5em;
      padding: 0;

    }
    .link-btn{
      bottom: 0;
      padding: 0;
      margin: 0;
    }

    .menu{
      border-top: .5em solid gray;
      border-left: .5em solid gray;
      border-bottom: .5em solid gray;
    }

    .menu:last-child{
      border-right: .5em solid gray;
    }

    .menu h2{
      text-align: center;
    }
    /*hides the carousel*/

    .div-title{
      text-align: center;
    }

    .links-div{
      margin-top: 15%;
    }

    .links-div a{
      font-size: 1.2em;
    }

    .text-center{
      text-align: center;
      font-size: 1rem;
    }

    .page-title{
      background-color: darkblue;
      color: white;
      padding: 2vw;
      font-family: sans-serif;
    }
    .spste-program h4{
    
    }

    .program-title{
      font-family:fantasy;
      text-align: center;
      /* font-weight: bold; */
      color: #000c54;
      text-align: center;
      font-size: 2vw;
    }

    .program-description{
      text-align: justify;
    }

    .hr-break{
      height: .2vw;
      background-color: #000c54;
    }

    .btn-menu{
      border: 2px solid gray;
      font-weight: bold;
      width: 12vw;
      height: 2.5vw;
    }

    .page-menu{
      position: fixed;
      top: 5%;
      z-index: 1000;
      /* width: 100%; */
     
    }

    .side-navigation{
      width: 1.5vw; float: left;
    }
</style>
<div class="row">
    <div class="col-md-12 text-center">
        <h1 class="page-title">
          <strong>JUNIOR HIGH SCHOOL PROGRAM</strong>
        </h1>
    </div>
</div><hr>

 <div class="div-main">
    <div class="row">
      <div class="col-md-4">
        <div class="page-menu">
          <div class="row mb-1 ">
            <div class="col-md-12"><button class="btn btn-menu spfl"><img src="upload/program logo/SPFL-K.png" alt="ste" class="side-navigation">SPFL-Korean</button>
            </div>
          </div>
          <div class="row mb-1 ">
            <div class="col-md-12"><button class="btn btn-menu spste"><img src="upload/program logo/SPSTE.png" alt="ste" class="side-navigation">  SPSTE</button>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu stvep"><img src="upload/program logo/STVEP.png" alt="stvep" class="side-navigation">  STVEP</button>
          </div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu sse"><img src="upload/program logo/SPBE.png" alt="sse" class="side-navigation" >  SPBE</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu spj"><img src="upload/program logo/SPJ.png" alt="spj" class="side-navigation">  SPJ</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu sa"><img src="upload/program logo/SA.png" alt="sa" class="side-navigation">  SA</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu sps"><img src="upload/program logo/SPS.png" alt="sps" class="side-navigation">  SPS</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu ohsp"><img src="upload/program logo/OHSP.png" alt="ohsp" class="side-navigation">  OHSP</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu eoc"><img src="upload/program logo/EOC.png" alt="eoc" class="side-navigation">  EOC</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu pssn"><img src="upload/program logo/PSSN.png" alt="pssn" class="side-navigation">  PSSN</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu als"><img src="upload/program logo/ALS.png" alt="als" class="side-navigation">  ALS</button></div>
          </div>
          <div class="row mb-1">
            <div class="col-md-12"><button class="btn btn-menu regular"><img src="upload/program logo/inhs logo.png" alt="regular" class="side-navigation">  REGULAR</button></div>
          </div>
        </div>
      </div>

      <!-- ++++++++++++++++++++++++++++++++++++++++++++++ -->

      <div class="col-md-8">
        <div class="spfl-program">
        <div class="row mb-4">
            <div class="col-12 ">
                <center><img src="upload/program logo/SPFL-K.png" alt="spste logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Special Program in Foreign Language - Korean (SPFL-Korean)</h1></center>
            </div>
            <div class="col-md-12 program-description">
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
      </div>
      <hr class="hr-break">

        <div class="spste-program">
        <div class="row mb-4">
            <div class="col-12 ">
                <center><img src="upload/program logo/SPSTE.png" alt="spste logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Special Program in Science Technology and Engineering (SPSTE)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
              The Special Science Class (SSC), now the Special Program in Science Technology and Engineering (SPSTE) 
              is the first Special Science Class in Western Visayas which was launched at the Iloilo National High School in 1988 
              to meet the scientific and technological manpower needs of the country. Its  consistent excellent academic performance as the No. 1 
              Science and Technology Network School of the DOST-SEI Project in the country since its approval  inspired the Department of Education 
              to adopt the Special  Science Class curriculum in the different Regions of the country.

              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="stvep-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/STVEP.png" alt="stvep logo" width="25%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Strengthened Technical-Vocational Education Program (STVEP)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="sse-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/SPBE.png" alt="sse logo" width="18%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title ">Special Program for Business and Entrepreneurship (SPBE)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                SPBE is a blended entrepreneurship class that follows the DepEd curriculum for Junior High School with eight core learning areas as specified in DepEd Order No.21,s. 2019. It is enhanced by the addition of two (2) specialized subjects on Entrepreneurship and balanced by the learner's presence in school during Science Laboratory and Technology and Livelihood Laboratory works. Learners socialize with their fellow learners during the scheduled MAPEH classes. 
              </p>
              <p>
                SPBE is envisioned to be the breeding center of dynamic and young entrepreneurs who develop innovative projects through collaboration in order to provide job opportunities that promote greater economic growth and sustainable nation-building.
              </p>

            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="spj-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/SPJ.png" alt="spj logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Special Program for Journalism (SPJ)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                  -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="sa-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/SA.png" alt="sa logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">School for the Arts (SA)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="sps-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/SPS.png" alt="sps logo" width="18%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Special Program for Sports (SPS)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="ohsp-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/OHSP.png" alt="ohsp logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Open High School Program (OHSP)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                The Republic Act No. 10665 or The Open High School System Act provided the mandate to the Department of Education to create Open High School Program. The law aims to broaden access of Filipino learners to relevant quality education through the employment of an alternative secondary education program that will enable the youth to overcome personal, geographical, socioeconomic, and physical constraints, to encourage them to complete secondary education.
                The Iloilo National High School is known for its “Schools-Within-A-School” Program which gives Filipino learners opportunities to appreciate their existence and discover themselves by providing different curricular offerings that hone their potential in the best way possible. This is our way of answering the national call for “no learner is left behind” and the global call for “Education for All”.
                The Open High School Program follows the existing regular curriculum of the Department of Education. What makes it different from the rest of the Special Programs of Iloilo National High School is the mode of delivery of instruction and the time of learning of learners. Instruction is delivered through Distance Education in which learners are provided with either a printed or a digital copy of  Self-Learning Modules. Online consultation is set to facilitate learning for those who have access to gadgets and an internet connection.
                To assess the progress of the learners, a limited face-to-face schedule is spent for assessment to be administered by the OHSP teachers. Learners are given 4 months for the Junior High School and 2 months for the Senior High School scheduled learning to help them adjust to the Self-Learning period or independent learning for the next quarter/s. This system serves as the transition period for OHSP learners. During this period, learners will have to follow a structured schedule and meet their teachers regularly. After the transition period, learners will then be given the opportunity to learn at their own pace.
                At the beginning of the school year, the learners will sign a contract and agreement on the following is stated:
                *The school’s expectations of the learner;
                *The school’s expectations of the parent/ 
                  guardian; and
                *The learning modules for coverage and the target 
                  date of completion.
                Write to Dave Horbino

              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="eoc-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/EOC.png" alt="eoc logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Evening Opportunity Class (EOC)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="pssn-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/PSSN.png" alt="pssn logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Program for Students with Special Needs (PSSN)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="als-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/ALS.png" alt="als logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Alternative Learning System (ALS)</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
        </div>
      </div>
      <hr class="hr-break">

      <div class="regular-program">
        <div class="row mb-4">
            <div class="col-12">
                <center><img src="upload/program logo/inhs logo.png" alt="regular logo" width="20%"></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <center><h1 class="program-title">Regular Class</h1></center>
            </div>
            <div class="col-md-12 program-description">
              <p>
                -
              </p>
            </div>
          </div>

          </div>
        </div>
      </div> 
  </div>

<script>
  
  
  $('.spfl').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".spfl-program").offset().top
    }, 1000);
  });

  $('.spste').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".spste-program").offset().top
    }, 1000);
  });

  $('.stvep').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".stvep-program").offset().top
    }, 1000);
  });

  $('.sse').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".sse-program").offset().top
    }, 1000);
  });

  $('.spj').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".spj-program").offset().top
    }, 1000);
  });

  $('.sa').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".sa-program").offset().top
    }, 1000);
  });

  $('.ohsp').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".ohsp-program").offset().top
    }, 1000);
  });

  $('.sps').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".sps-program").offset().top
    }, 1000);
  });

  $('.eoc').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".eoc-program").offset().top
    }, 1000);
  });

  $('.pssn').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".pssn-program").offset().top
    }, 1000);
  });

  $('.als').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".als-program").offset().top
    }, 1000);
  });

  $('.regular').click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".regular-program").offset().top
    }, 1000);
  });

</script>




<?= $this->endSection() ?>
