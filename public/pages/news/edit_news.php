
<div class="container">
  <div class="">
    <h1>Edit News</h1>
  </div>
  <hr>
    <div class="py-5 text-center">

        <form class="card p-2" action="#" method="post" enctype="multipart/form-data" id="update-form"></form>


          <div class="input-group">
            <label for="title" class="input-group-text" >Title</label>
            <input type="text" name="title" id="title" class="form-control" form="update-form" >
          </div><br>

          <div class="input-group">
            <label for="headlines" class="input-group-text">Headlines</label>
            <textarea name="headlines" rows="3" cols="40" class="form-control" id="headlines" form="update-form"></textarea>
          </div><br>

          <div class="input-group">
            <label for="body" class="input-group-text" >Body</label>
            <textarea name="body" rows="8" cols="80" class="form-control" id="body" form="update-form"></textarea>
          </div><br>

          <div class="input-group mb-3">
            <label class="input-group" for="">Upload an Image</label>
            <input type="file" class="form-control" name="news_image" id="newsImage" onchange="readURL(this);" form="update-form">
          </div>

          <input type="hidden" name="hidden_news_filename" id="hidden_news_filename" value="" form="update-form">


          <div class="">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
              width="500" height="500" role="img"
              preserveAspectRatio="xMidYMid slice"
              focusable="false" src="" id="news-img" name="news-img"
              alt="news image" form="update-form">
            </img>
          </div>

    <br><br>
          <input type="hidden" name="input_newsId" id="input_newsId" value="" form="update-form">
          <button type="submit" name="newsId" id="newsId" class="btn btn-primary" form="update-form">Update News</button>

          <hr class="my-4">


      </div>
  </div>


  <script type="text/javascript">

  function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#news-img')
                   .attr('src', e.target.result)
                   .width(400)
                   .height(400);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }

   $(document).ready(function(){

     $('#update-form').submit(function(event){
       event.preventDefault();
       $.ajax({
         url: 'news/update',
         method: 'post',
         dataType: 'json',
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function(response){
           //console.log(data);
           if (response.status == 0) {
             errorToast(response.message);
           }else {
             updateToast(response.message);
           }

           $('.content-div').load('pages/news/news_list.php');
           console.log(response.id_pass);
         }
       });
     });

   });

   function succToast(msg){
     //resetToastPosition();
     $.toast({
       heading: 'Data Saved Successfully',
       text: msg,
       showHideTransition: 'slide',
       icon: 'success',
       loderBg: '#f96868',
       position: 'top-right',
       hideAfter: 5000
     });
   }

   function updateToast(msg){
     //resetToastPosition();
     $.toast({
       heading: 'Data Updated Successfully',
       text: msg,
       showHideTransition: 'slide',
       icon: 'success',
       loderBg: '#f96868',
       position: 'top-right',
       hideAfter: 5000
     });
   }

   function errorToast(msg){
   //  resetToastPosition();
     $.toast({
       heading: 'Action Failed',
       text: msg,
       showHideTransition: 'slide',
       icon: 'error',
       loderBg: '#f2a654',
       position: 'top-right'
     });
   }
  </script>
