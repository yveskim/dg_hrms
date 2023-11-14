<style media="screen">
  .container{
    padding: 0 15% 0 15%;
  }
</style>

<div class="container container-fluid">
  <div class="row">
    <div class="col-md-12">
      <img src="<?= base_url('upload/news_images').'/'.esc($news['news_image']) ?>" style="width:100%">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h2 class="w3-wide"><strong>  <?= esc($news['title']) ?></strong></h2>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-md-12">
        <p> <strong>  <?= esc($news['headlines']) ?></strong></p>
    </div>
  </div>
  <hr>



  <div class="row mb-4">
    <div class="col-md-12">
      <p class="w3-justify">  <?= esc($news['body']) ?></p>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-md-12">
      <span>Link here: &nbsp;&nbsp;</span>
      <a href="<?= base_url('upload/news_files').'/'.esc($news['news_file']) ?>" style="color: blue; text-decoration: underline; font-weight: bold;"><?php echo esc($news['news_file']); ?></a>
    </div>
  </div>

  <hr>

  <div class="row mb-4">
    <div class="col-md-12">
      <p class="w3-opacity"><i><?= "Author: " . esc($news['news_author']) ?></i></p>
    </div>
  </div>

</div>
