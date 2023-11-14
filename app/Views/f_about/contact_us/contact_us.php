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
            <h4><strong>CONTACT US</strong></h4>
        </div>
    </div><hr>

    <div class="row">
        <div class="col-12">
           <img src="upload/system_file/contact_us.jpg" alt="contact_us">
        </div>
   </div><hr>
 </div>






<?= $this->endSection() ?>
