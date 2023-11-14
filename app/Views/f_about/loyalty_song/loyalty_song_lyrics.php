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

</style>

 <div class="div-main">
    <div class="row">
        <div class="col-md-12 text-center">
            <h4><strong>THE LOYALTY SONG</strong></h4>
        </div>
    </div><hr>

    <div class="row">
        <div class="col-12">
            <div class="content" style="padding: 0 25% 0 25%">
                <p class="text-center">
                                    I.
                                    <br>

                    Now let our glad voices heartily ringing out,
                    Waken the echoes both far and near,
                    Let the song we sing recall
                    Days we've passed in this hall,
                    Happy high school days to all
                    Days to memory dear.
                    <br>
                    (Repeat)

                </p>

                <p class="text-center">
                    II
                    <br>

                  Days that we have been spending together
                  Days of fair and stormy weather
                  Each day that passes once more declares
                  That no school, with our school compares
                  For our school's the finest, the first and among them all the best,
                  Our standard of study and sport takes the lead of all the rest;
                  We're proud of our high school and the name she bears.
                  <br>
                  (Repeat Part I)

                </p>

                <p class="text-center">

                    III
                    <br>

                    To our High School each one of us will be true
                    To our High School loyal we'll be thro' and thro'
                    Though the years may dim our recollections
                    With the changes time may bring.
                    Yet your name and fond affection we will ever sing.
                    We are ever ready for your cherish'd sake,
                    The sacrifice of self and selfish little ambitions to make
                    We shall strive so that at the campus or class,
                    In glory and in honor our High School shall ever surpass.
                    We shall strive on campus and in class
                    That in honor none our High School shall surpass.

                </p>

            </div>
        </div>
   </div><hr>

    <div class="row">
      <div class="col-md-12" >
        <video width="100%" height="100%" controls id="loyalty_song">
          <source src="upload/system_file/Loyalty Song.mp4" type="video/mp4">
            Loyalty Song
        </video>
      </div>
    </div>
 </div>

<script>
let theVideo = document.getElementById("loyalty_song");
  document.onkeydown = function(event) {
      switch (event.keyCode) {
         case 37:
              event.preventDefault();
              
              vid_currentTime = theVideo.currentTime;
              theVideo.currentTime = vid_currentTime - 5;
            break;
         
         case 39:
              event.preventDefault();
              
              vid_currentTime = theVideo.currentTime;
              theVideo.currentTime = vid_currentTime + 5;
            break;
         
      }
  };

</script>




<?= $this->endSection() ?>
