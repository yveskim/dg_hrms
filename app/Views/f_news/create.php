<style media="screen">
  .container{
    padding: 0 15% 0 15%;
  }
</style>


<div class="container">
  <br><br><br>
  <div class="">
    <a href="<?= base_url('admin') ?>" type="button" name="button" class="btn btn-info">Back to Admin Page</a>

  </div>
  <hr>
    <div class="py-5 text-center">
      <?= \Config\Services::validation()->listErrors() ?>

        <h2><?= esc($title) ?></h2>

        <form class="card p-2" action="/news/create" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <div class="input-group">
            <label for="title" class="input-group-text" >Title</label>
            <input type="text" name="title" id="title" class="form-control" >
          </div><br>

          <div class="input-group">
            <label for="headline" class="input-group-text">Headlines</label>
            <textarea name="headline" rows="3" cols="40" class="form-control" id="headline"></textarea>
          </div><br>

          <div class="input-group">
            <label for="body" class="input-group-text" >Body</label>
            <textarea name="body" rows="10" cols="50" class="form-control" id="body"></textarea>
          </div><br>

          <div class="input-group">
            <label for="author" class="input-group-text" >Author</label>
            <input type="text" name="author" id="author" class="form-control" >
          </div><br>

          <div class="input-group">
            <label for="news_link" class="input-group-text" >Add Link</label>
            <input type="text" name="news_link" id="news_link" class="form-control" >
          </div><br>

          <?php // TODO: add links to database and file upload  ?>

          <div class="input-group mb-3">
            <label class="input-group" for="">Upload an Image</label>
            <input type="file" class="form-control" id="" name="news_image" onchange="readURL(this);">
          </div>

          <div class="">
            <img src="" alt="" id="news-image">
          </div>
          <?php // TODO: make file accept file only. make image accept image only ?>

          <div class="input-group mb-3">
            <label class="input-group" for="">Upload a File</label>
            <input type="file" class="form-control" id="" name="news_file">
          </div>

          <br><br>

          <button type="submit" class="btn btn-secondary">Publish News</button>

          <hr class="my-4">
        </form>

      </div>
  </div>

<script type="text/javascript">
function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#news-image')
                 .attr('src', e.target.result)
                 .width(300)
                 .height(300);
         };

         reader.readAsDataURL(input.files[0]);
     }
 }
</script>
