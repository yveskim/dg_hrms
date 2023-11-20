<style media="screen">
  .title-text{
    text-align: left;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <h4 class="title-text">Employee Master File</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <button class="btn btn-primary" type="button" name="button" id="btnAddNew">Add New</button>
  </div>
</div>
<div class="x_content">
  <div class="row">
    <div class="col-md-10">
      <table class="table table-bordered table-hover tableEmp table-sm table-compact" style="white-space: nowrap; width: 100%;">
        <thead>
          <tr>
            <th></th>
            <th width="5%">View</th>
            <th>DepEd ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th width="5%">Del</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>


<script type="text/javascript" src="assets/myCustomJs/faculty_profile.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    loadPage();

    $('#btnAddNew').click(function(){
      //alert('check');
      $('.content-div').load('pages/employee/add_employee.php', function(){

      });
    });

  });

  function loadPage(){
  //  let username = $(this).val();
    $.ajax({
     url: 'admin/loadEmp',
     method: 'get',
     dataType: 'json',
     beforeSend: function(){
        $('.spiner-div').show();
        $('.div-blur').show();
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();
     },
     success: function(data){
       $('.tableEmp').DataTable({
         "data": data.emp,
         "responsive": false,
         "autoWidth": false,
         "scrollX": true,
         "destroy": true,
         "columns": [
          {
            data: null,
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            },
          },
           {
             "data": null,
             render: function(data, type, row) {
             return '<button class="btn btn-warning btn-xs view full-size" id="'+data.emp_id+'"><i class="fa fa-search"></i></button>';
             }
           },
           {"data": "emp_agency_employee_no"},
           {"data": "emp_fname"},
           {"data": "emp_mname"},
           {"data": "emp_lname"},
           {"data": "emp_gender"},
           
           {
             "data": null,
             render: function(data, type, row) {
             return '<button type="button" class="btn btn-danger btn-xs full-size  delete " id='+data.emp_id+'><i class="fa fa-trash"></i></button>';
             }
           }
         ]
       });

       $('.tableEmp').on('click', '.view', function(){
        let emp_id = $(this).prop('id');
          
              $.ajax({
                url: 'admin/eachEmp',
                method: 'get',
                dataType: 'json',
                data: {emp_id: emp_id},
                success: function(res){
                  $('.content-div').load('pages/employee/each_employee.php', function(){

                      $('html, body').animate({
                          scrollTop: $(".content-div").offset().top
                      }, 500);
      
                      $("#fullname").text(res.emp.emp_fname+" "+ res.emp.emp_mname +" "+ res.emp.emp_lname);
                      if(res.stat != null){
                        $("#emp_position").text(res.stat.plantilla_title);
                      }else{
                        $("#emp_position").text("N/A");
                      }

                      // TODO: Add station

                      if(res.cat != null){
                        $("#emp_category").text(res.cat.cat_title);
                      }else{
                        $("#emp_category").text("N/A");
                      }

                      if(res.dept != null){
                        $("#emp_department").text(res.dept.dept_title);
                      }else{
                        $("#emp_department").text("N/A");
                      }

                      if(res.des != null){
                        $("#emp_designation").text();
                      }else{
                        $("#emp_designation").text("N/A");
                      }
                      
                      // Checking if image exist
                      $.ajax({
                          url:'upload/user_files/'+res.emp.emp_image,
                          type:'HEAD',
                          error: function()
                          {
                              $(".profile_pic").attr("src", 'upload/system_file/noimage.png');  
                          },
                          success: function()
                          {
                              $(".profile_pic").attr("src", 'upload/user_files/'+res.emp.emp_image);
                          }
                      });
                      
                      $("#emp_id").val(res.emp.emp_id);//!Reference ID do not remove or delete line 
                     
                    });

                  }
            });//ajax end
      })//end of click

      $('.tableEmp').on('click', '.delete', function(){
          let emp_id = $(this).prop('id');
          if (confirm('Are you sure you want to delete employee id '+emp_id+' ?')) {
            $.ajax({
              url: 'admin/deleteEmp',
              method: 'post',
              dataType: 'json',
              data: {emp_id: emp_id},
              success: function(response){

                  if (response.status == 0) {
                    alert("can't delete the row");
                    errorToast(response.message);
                  }else {
                    /*tr.fadeOut(1000, function(){ // **add this
                        $(this).remove();
                    });*/
                    //alert("are you sure you want to delete this data?");
                    deleteToast(response.message);
                    $('.content-div').load('pages/employee/employee_master_data.php');
                  }
              }
            });

          } else {
              // $('.tableEmp').off();
          }

       });


     }//success end



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



