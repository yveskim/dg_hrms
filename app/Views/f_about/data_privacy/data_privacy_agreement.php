<?= $this->extend('f_layout/home_layout') ?>

<?= $this->section('content') ?>

<style media="screen">

  .div-main{
    background-color: white;
    padding: 2%;
    margin: 0 5% 0 5%;
    min-height: 800px;
    overflow: hidden;
    border-radius: 2em;
  }

  .btn-menu{
    height: 5em;
    width: 100%;
    padding: 5%;
  }

    .content h2, .content p, .content a {
      font-family: sans-serif;

    }

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

    .text-justified{
      text-align: justify;
      font-size: 1rem;
    }

</style>

 <div class="div-main">
    <div class="row">
        <div class="col-md-12 text-center">
            <h4><strong>DATA PRIVACY AGREEMENT</strong></h4>
        </div>
    </div><hr>

    <div class="row">
        <div class="col-12">
            <div class="content" style="padding: 0 25% 0 25%">
                <p class="text-justified">
                  The Iloilo National High School (INHS) recognize our responsibilities under the Republic Act No. 10173 (Act), 
                  also known as the Data Privacy Act of 2012, with respect to the data we collect, record, organize, update, use, 
                  consolidate or destruct from our stakeholders. The personal data obtained from this portal/website is entered and stored 
                  within the Schools authorized Information and Communications Technology Officers and will only be accessed by the 
                  schools administrators and assigned personnel. The INHS have instituted appropriate organizational, technical and physical 
                  security measures to ensure the protection of the stakeholders personal data.

                  Furthermore, the information collected and stored in the portal shall only be used for the following purposes:

                  Early Pre-registration and admission for school opening, processing and reporting of documents related on enrollment,
                  admission related activities, enrollment process and other related matters. INHS shall not disclose any data and information gathered 
                  without their consent and shall retain this information for future reference and for effective data management of school information system. 
 
                </p>
                <hr>
                <br>
                <h4 class="text-center">STAKEHOLDERS / STUDENTS CONSENT:</h4>
                <br>
                <p class="text-justified">
                  I/We hereby authorize Iloilo National High School to retain, process, disseminate and record all my personal data in any way the School deems necessary. 
                  Further, I state my consent to and understanding that this information may be used by the school to communicate, 
                  either by post, telephone, mobile text, email or any other way, with me regarding any services, offers and notifications at a 
                  later date. In the event that I do not wish to be contacted further, I shall inform the school accordingly.
                </p>
            </div>
        </div>
   </div><hr>

 </div>

<script>


</script>




<?= $this->endSection() ?>
