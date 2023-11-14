<style media="screen">
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  }
  th, td {
  padding: 5px;
  text-align: left;
  }

  th{
    width: 10%;

  }
</style>
<button class="btn btn-info back" type="button" name="button">Go Back</button>
<hr>
<h1>News Details</h1>

<table class="table table-bordered striped tableNews compact sm">
  <tbody>
    <tr>
      <th>Id</th>
      <td id="id"></td>
    </tr>
    <tr>
      <th>Title</th>
      <td id="title"></td>
    </tr>
    <tr>
      <th>Headlines</th>
      <td id="headlines"></td>
    </tr>
    <tr>
      <th>Slug</th>
      <td id="slug"></td>
    </tr>
    <tr>
      <th>Body</th>
      <td id="body"></td>
    </tr>
    <tr>
      <th>Image</th>
      <td id="news_image"></td>
    </tr>
    <tr>
      <th>Author</th>
      <td id="news_author"></td>
    </tr>
    <tr>
      <th>Publisher</th>
      <td id="publisher"></td>
    </tr>
    <tr>
      <th>Date Published</th>
      <td id="publish_time_stamp"></td>
    </tr>
    <tr>
      <th>Updated By</th>
      <td id="updated_by"></td>
    </tr>
    <tr>
      <th>Date Updated</th>
      <td id="update_time_stamp"></td>
    </tr>
    <tr>
      <th>Deleted By</th>
      <td id="deleted_by"></td>
    </tr>
    <tr>
      <th>Date Deleted</th>
      <td id="delete_time_stamp"></td>
    </tr>
    <tr>
      <th>Is Deleted</th>
      <td id="is_deleted"></td>
    </tr>
  </tbody>
</table>


<script type="text/javascript">
  $(document).ready(function(){
    $('.back').click(function(){
        $('.content-div').load('pages/news/news_list.php');
    });
  });
</script>
