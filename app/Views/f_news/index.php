<?= $this->extend('f_layout/home_layout') ?>


<?= $this->section('content-carousel') ?>

<style media="screen">

.carousel-indicators li {
    width: 5em;
    height: 1em;
}
.carousel-indicators {
    bottom: -4em;
}

.announcements-div{
  padding: 4em;
  background-color: white;
  margin: 4em;
  border: .5em solid blue;
  border-radius: 2em;
  background-image: url('upload/system_file/bg with minerva.png');
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 50em;
  opacity: .8;
}

.banner-div{
  margin-top: 5%;
  position: absolute;
  z-index: 1000000;
  margin-left: 50%;
}

#banner-image{
  width: 10em;
  height: 10em;
}

#banner-image{
  cursor: pointer;
}


/* news css */


  .news-headlines{
     bottom: 0;
     left: 0;
     top: 60%;
     float: left;
     background-color: black;
     padding: 2% 2% 2% 5%;
     opacity: .8;
     min-width: 100%;
     width: 100%

  }

  .news-div{
    padding-left: 2rem;
  }

  .carousel-caption {
    border-radius: 2em;
  }

  .carousel-caption h5 {
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 1%;
  }

  .carousel-caption p {
    width: 75%;
    margin: auto;
    font-size: 1.5em;
    line-height: 1.9;
  }

  #crousel-item{
    /* margin-top: 7em; */
  }

</style>

<!-- <div id="crousel-item" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#crousel-item" data-slide-to="0" class="active"></li>
    <li data-target="#crousel-item" data-slide-to="1"></li>
    <li data-target="#crousel-item" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="upload/system_file/WEBSITE BANNER JHS OFFERINGS 002.jpg" alt="First slide">

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="upload/system_file/WEBSITE BANNER SHS OFFERINGS.jpg" alt="Second slide">
   
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="upload/system_file/WEBSITE BANNER OPEN HIGH OFFERINGS.jpg" alt="Third slide">

    </div>
  </div>
  <a class="carousel-control-prev" href="#crousel-item" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#crousel-item" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

<div>
  <img src="upload/system_file/facade.jpg" alt="facade" style="height: auto;width:100%;object-fit: cover; ">
</div>


<!--- ignore the code below-->
<?= $this->endSection() ?>

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

.update-header{
  font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  font-size: 1.3rem;
  text-decoration:solid;
  /* font-weight: bold; */
}

.updates-logo{
  object-fit:contain;
  width: 100%;
  height: auto;
  
}

.updates-headlines{
  text-align: justify;
}
</style>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <strong><h2 id="news-header">WHAT'S NEW</h2></strong>
    </div>
  </div>
  <hr class="hr-break">

  <!-- shows the new changes and updates in nasyo academics and programs -->

  <div class="row">
    <!-- left content -->
    <div class="col-md-6">
      <!-- first content -->
      <div class="row">
        <!-- logo content -->
        <div class="col-md-4">
            <div class="">
              <img class="updates-logo"  src="upload/system_file/matatag.jpg" alt="image">
            </div>
        </div>
        <!-- title content -->
        <div class="col-md-8">
            <a href="news_ohsp" class="update-header">
              Lorem Epsum
            </a>
            <hr>
            <p class="updates-headlines">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam suscipit modi, obcaecati dolores velit, quam enim fuga tempora eligendi officia sequi reprehenderit itaque voluptates? Minima enim velit in perspiciatis accusantium.
            </p>
        </div>
      </div>
      <hr>
      <!-- second content -->
      <div class="row">
        <!-- logo content -->
        <div class="col-md-4">
            <div class="">
              <img class="updates-logo"  src="upload/system_file/matatag.jpg" alt="image">
            </div>
        </div>
        <!-- title content -->
        <div class="col-md-8">
            <a href="news_spfl" class="update-header">
              lorem ipsum
            </a>
            <hr>
            <p class="updates-headlines">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam recusandae, minima numquam distinctio explicabo accusamus reiciendis exercitationem ipsa saepe voluptatibus omnis earum suscipit modi illum cum temporibus deleniti quam deserunt!
            </p>
        </div>
        <hr>
      </div>
    </div>




    <!-- right content -->
    <div class="col-md-6" style="border-left: .2rem solid lightgray;">
      <div class="row">
        <!-- logo content -->
        <div class="col-md-4">
            <div class="">
              <img class="updates-logo"  src="upload/system_file/matatag.jpg" alt="image">
            </div>
        </div>
        <!-- title content -->
        <div class="col-md-8">
            <a href="news_spste" class="update-header">
              Lorem Ipsum
            </a>
            <hr>
            <p class="updates-headlines">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime blanditiis labore laborum soluta libero nostrum dolorem odit rem? Animi similique officia eius veniam quod fugit laboriosam rem! Nostrum, error quo.
            </p>
        </div>
      </div>
      <hr>

      <div class="row">
        <!-- logo content -->
        <div class="col-md-4">
            <div class="">
              <img class="updates-logo"  src="upload/system_file/matatag.jpg" alt="image">
            </div>
        </div>
        <!-- title content -->
        <div class="col-md-8">
            <a href="news_spbe" class="update-header">
              Lorem Ipsum
            </a>
            <hr>
            <p class="updates-headlines">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id tenetur rerum doloremque tempore, dolores fugiat temporibus quasi doloribus est repellendus atque quibusdam dignissimos repellat exercitationem pariatur illum? Porro, quibusdam aspernatur!
            </p>
        </div>
        <hr>


    </div>




  </div>


</div>
<hr>
<br>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <strong><h2 id="news-header">NEWS/UPDATES</h2></strong>
      </div>
    </div>
    <hr class="hr-break">

    <div class="row">
      <div class="col-md-12">
        <div id="news-div">
          <!-- START THE FEATURETTES -->
          <br>
          <div class="news-content">
            <?php if (! empty($news) && is_array($news)) : ?>
            <?php foreach ($news as $news_item): ?>

          <div class="row featurette text-center">
            <div class="col-md-12 news-div">

              <div class="row">
                <div class="col-md-12" style="text-align: left">
                    <h4 class="" style="text-transform: capitalize"><a class="" target="_blank" href="/news/<?= esc($news_item['slug'], 'url') ?>"  > <?= esc($news_item['title']) ?></a></h4>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12" style="text-align: left">
                  <p class=""><?= esc($news_item['headlines']) ?></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12" style="text-align: left">
                  <p>By: <?php if ( ! empty($news_item['news_author']) ) {
                    echo esc($news_item['news_author']);
                  }else {
                    echo "n/a";
                  } ?></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12" style="text-align:left;">
                  <p><?php echo "Date: ".esc($news_item['publish_time_stamp']); ?></p>
                </div>
              </div>

            </div>
          </div>
          <hr>


        <?php endforeach; ?>
          <div id="end-news">
            <!-- <a href="#" id="olderUpdates" load_limit="0">See Older Updates...</a> -->
            <form action="news" method="get">
              <input type="hidden" name="cur_limit" value="<?php echo $limit ?>">
              <button type="submit" class="btn btn-sm btn-default" name="load_limit" style="color: blue;">Load Older Updates...</button>
            </form>
          </div>
          </div>
          <?php else : ?>
            <div class="no-news">
              <h3>No News</h3>
              <p>Unable to find any news for you.</p>
            </div>
          <?php endif ?>
          <hr class="featurette-divider">
          <!-- /END THE FEATURETTES -->
        </div><!-- /.container -->
      </div>
    </div>
  </div>



  <script type="text/javascript">
    $(document).ready(function(){

      // $('#olderUpdates').click(function(event){
      //   event.preventDefault();
      //   let load_limit = $(this).attr('load_limit');
      //   // console.log(load_limit);
      //   $.ajax({
      //     type: 'get',
      //     url: 'loadNews',
      //     data:{load_limit: parseInt(load_limit)},
      //     dataType: "json",
      //     cache: false,
      //     success: function (res) {
      //        $('#olderUpdates').attr('load_limit', parseInt(load_limit) );
      //        console.log(res);
      //        // $("#news-div").load('loadNews');
      //        $(".news-content").load('loadNews');
      //     }
      //   });//end ajax
      // });


    });


  </script>



<?= $this->endSection() ?>
