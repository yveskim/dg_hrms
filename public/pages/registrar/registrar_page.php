
<style media="screen">

  .content h2, .content p, .content a {
    font-family: sans-serif;
  }

  .content{
    background-color: darkblue;
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

  .menu p, .menu h2, .menu h5{
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

  .large-hr{
    height: 1em;
    background-color: white;
    width: 100%;
  }

  .video-title{
    color: white;
  }
</style>
<div class="row">

  <div class="col-12">


    <div class="content">
      <!-- <div class="row">
        <div class="col-md-12">
          <h1 class="video-title">How to Pre-register Online</h1>
        </div>
        <div class="col-md-12 video-div">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/cFxJJJTY4II" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div> -->
      <hr class="large-hr">
      <div class="row">
        <div class="col-md-3 menu">
          <a href="admission" class="link-btn">
            <span class="bi bi-person-lines-fill admission-icon"></span>
          </a>
          <!-- <a href="#" class="link-btn" id="btn-admission">
            <span class="bi bi-person-lines-fill admission-icon"></span>
          </a> -->
          <h5>Online Pre-registration</h5>
        </div>

        <!-- <div class="col-md-3 menu">

            <a href="#" class="link-btn" id="btn-transferees" disabled>
              <span class="bi bi-person-badge admission-icon"></span>
            </a>
            <h5>Online Pre-registration for JHS Transferees</h5>
        </div> -->

        <!-- <div class="col-md-3 menu">

            <a href="#" class="link-btn">
              <span class="bi bi-archive-fill admission-icon"></span>
            </a>
            <h2>Records</h2>
        </div>

        <div class="col-md-3 menu">
            <a href="#" class="link-btn">
              <span class="bi bi-journal-check admission-icon"></span>
            </a>
            <h2>Registrars</h2>
        </div> -->

      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
  // $('#btn-admission').click(function(){
  //   alert('The Online Pre-registration for Iloilo National High School is officially closed');
  // });

  // $('#btn-transferees').click(function(){
  //   alert('The Online Pre-registration for transferees in Iloilo National High School is officially closed');
  // });
});

</script>
