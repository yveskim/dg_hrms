<style media="screen">

</style>
<div class="" style="text-align:center">
  <h1>News Item</h1>
</div>
<div class="">
  <a href="news/create" class="btn btn-info" >Create News</a>
  <a href="news" target="_blank" class="btn btn-primary" >View News</a>
</div><hr>
<div class="x_content">
<table class="table table-bordered stripe tableNews compact table-sm" id="datatable-button">
  <thead>
    <tr>
      <th>News ID</th>
      <th>News Title</th>
      <th>Date Published</th>
      <th>Author</th>
      <th style="text-align:center">Action</th>
    </tr>
  </thead>
</table>

</div>


<script type="text/javascript">
  $(document).ready(function(){

    loadPage();

  });



  function loadPage(){
  //  var username = $(this).val();
    $.ajax({
     url: 'loadNews',
     type: 'get',
     dataType: 'json',
     success: function(data){
      // console.log(response);
       $('.tableNews').DataTable({
         "data": data.news,
         "responsive": true,
         "columns": [
           {"data": "id"},
           {"data": "title"},
           {"data": "publish_time_stamp"},
           {"data": "news_author"},
           {
             "data": null,
             "className": "text-center",
             render: function(data, type, row) {
             return '<button class="btn btn-info btn-sm view "  value='+data.id+'>View</button>'+
                    '<a style="color:white" class="btn btn-primary btn-sm edit" value='+data.id+'>Edit</a>'+
                    '<button class="btn btn-danger btn-sm delete"  value='+data.id+'>Delete</button>';
             }
           }
         ]
       });

       var table = $('.tableNews').DataTable();
       $('.view').click(function(){
         $('.tableNews').on('click', 'tr',  function(){
           var data = table.row( this ).data();
             //console.log( data['emp_id'] );
             var newsId = data['id'];
              $.ajax({
                url: 'news/viewNews',
                type: 'get',
                dataType: 'json',
                data: {newsId: newsId},
                success: function(response){

                  $('.content-div').load('pages/news/view_news.php', function(){
                    $.each(response.news, function(key, value) {
                      $('#id').html(value['id']);
                      $('#title').html(value['title']);
                      $('#headlines').html(value['headlines']);
                      $('#slug').html(value['slug']);
                      $('#body').html(value['body']);
                      $('#news_image').html(value['news_image']);
                      $('#news_author').html(value['news_author']);
                      $('#publisher').html(value['publisher']);
                      $('#publish_time_stamp').html(value['publish_time_stamp']);
                      $('#updated_by').html(value['updated_by']);
                      $('#update_time_stamp').html(value['update_time_stamp']);
                      $('#deleted_by').html(value['deleted_by']);
                      $('#delete_time_stamp').html(value['delete_time_stamp']);
                      $('#is_deleted').html(value['is_deleted']);
                    });

                  });

                }
              });
         });
       });//ajax end
     },//success end
     complete: function(){
       $('.delete').click(function(){
         var table = $('.tableNews').DataTable();
            $('.tableNews').on('click', 'tr',  function(){
                var data = table.row( this ).data();
                //console.log( data['emp_id'] );
                var newsId = data['id'];
                var newsImage = data['news_image'];
                var tr = $(this).closest('tr');  // **add this
                if (confirm('Are you sure you want to delete news about '+data['title']+' ?')) {
                  $.ajax({
                    url: 'news/delete',
                    type: 'post',
                    dataType: 'json',
                    data: {newsId: newsId,
                            newsImage: newsImage
                          },
                    success: function(response){

                        if (response.status == 0) {
                          alert("can't delete the row");
                          //errorToast(response.message);
                        }else {
                          /*tr.fadeOut(1000, function(){ // **add this
                              $(this).remove();
                          });*/
                          //alert("are you sure you want to delete this data?");
                          $('.content-div').load('pages/news/news_list.php');
                          deleteToast(response.message);

                        }
                    }
                  });//endofajax

                } else {

                  $('.content-div').load('pages/news/news_list.php');
                }


            });
       });

       $('.edit').click(function(){
         var table = $('.tableNews').DataTable();
         $('.tableNews').on('click', 'tr',  function(){
           var data = table.row( this ).data();
            //console.log(data['id']);
            var newsId = data['id'];

            $.ajax({
                url: 'news/edit',
                type: 'post',
                dataType: 'json',
                data: {newsId:newsId},
                success: function(response){
                  //console.log(response.news);

                  $('.content-div').load('pages/news/edit_news.php', function(){
                    //  $title = "";

                    $.each(response.news, function(key, value) {
                      $newsImage = value['news_image'];
                      $('#newsId').val(value['id']);
                      $('#input_newsId').val(value['id']);
                      $('#title').val(value['title']);
                      $('#headlines').val(value['headlines']);
                      $('#body').val(value['body']);
                      $('#hidden_news_filename').val(value['news_image']);
                      $('#news-img').attr('src', 'upload/'+value['news_image']);
                    });



                  });


                }
            });
         });
       });

     }//end of complete:



    });

}


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


    function deleteToast(msg){
    //  resetToastPosition();
      $.toast({
        heading: 'Action Successfull',
        text: msg,
        showHideTransition: 'slide',
        icon: 'error',
        loderBg: '#f2a654',
        position: 'top-right'
      });
    }
</script>
