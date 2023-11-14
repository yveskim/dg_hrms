

<style media="screen">
  .title-text{
    text-align: center;
  }

  #pending-text{
    color: orange;
    border-bottom: 1px solid black;
  }

  #validated-text{
    color: green;
    border-bottom: 1px solid black;
  }

  #declined-text{
	color: red;
	border-bottom: 1px solid black;
  }

  .btn-group-xs > .btn, .btn-xs {
    padding: .45rem .2rem;
    font-size: .675rem;
    line-height: .5;
    border-radius: .2rem;
  }

  .btn-active{
    border-bottom: 4px solid gray;
    margin-bottom: -1px;
    margin-top: -1px;
  }

  .spiner-div{
    position: fixed;
    top: 0;
    left: 0;
    padding-left: 45%;
    padding-top: 10%;
    width: 100%;
    height: 100%;
    background-color: rgb(10, 10, 10, .5);
    z-index: 1000;
  }

  .div-blur{
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 0;
    background-color: black;
    opacity: .5;
    z-index: 100;
  }

  .faded{
    opacity: .9;
  }

  .form137-div{
    text-align: center;
  }

  .btn-option{
    width: 100%;
  }

  .filter-modal-body{
    padding: 2em;
  }

  .tbl-text-sm{
    font-size: .7rem;
  }

  /* ----------------------------------------------------- */

/* radio button large */
.rad-assessment {
   transform: scale(1.5);
}

.rad-div{
  border-radius: .5em;
  padding: .5em 1em .5em 1em;
  width: 100%;
  color: white;
}

.rad-div:not(:first-child){
  margin-left: 3em;
}


.tableFaculty{
  overflow-x: scroll;
}

.full-size{
  width: 100%;
}
/* ---------------------------------- */
</style>
<div class="div-blur"></div>

<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>




<div class="row">
  <div class="col-12">
    <h1 class="title-text">Faculty Data</h1>
  </div>
</div>

<hr>

<div class="data-div">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover table-striped tableFaculty compact table-sm table-condensed tbl-text-sm" id="datatable-button">
        <thead>
          <tr>
            <th>#</th>
            <!-- <th>En ID</th> -->
            <th>Emp Sch. ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Job Desc.</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

  <script type="text/javascript">
  $(document).ready(function(){

    $('.spiner-div').hide();
    $('.div-blur').hide();
    
    loadEnrollmentData();
  })

  function loadEnrollmentData(){
    $.ajax({
      url: 'getFaculty',
      method: 'get',
      dataType: 'json',
      beforeSend: function(){
        $('.spiner-div').show();
        $('.div-blur').show();
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
     },
     complete: function(){
       $('.spiner-div').hide();
       $('.div-blur').hide();
     },

     success: function(data){
      $('.tableFaculty').off();
      $('.tableFaculty').DataTable().clear().destroy();
         $('.tableFaculty').DataTable({
           "data": data.faculty,
          //  "responsive": true,
           "scrollX": true,
           "autoWidth": false,
           "destroy" : true,
		       "dom": 'lBfrtip',
			     "buttons": [
				      'copy', 'csv', 'excel', 'pdf', 'print'
			      ],
           "columns": [
 
             {
                 "data": null,
                 render: function (data, type, row, meta) {
                     return meta.row + meta.settings._iDisplayStart + 1;
                 }
             },
             {"data": "emp_school_id"},
             {"data": "emp_fname"},
             {"data": "emp_mname"},
             {"data": "emp_lname"},
             {"data": "emp_gender"},
             {
               "data": null,
                render: function(data, type, row) {
                  if(data.job_description == 2){
                    return  'Faculty';
                  }
               }
             },
             {
               "data": null,
                render: function(data, type, row) {
                return  '<button type="button" name="emp_id" id="'+data.emp_id+'" class="fa fa-eye btn btn-primary btn-sm details" title="view details"></button>';
               }
             }
           ]
         });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
         let table = $('.tableFaculty').DataTable();

         $('.delete_emp').click(function(){
          // alert($(this).prop('id'));
          let emp_id = $(this).prop('id');
          $.ajax({
            url: 'deleteFaculty',
            method: 'get',
            dataType: 'json',
            data: {emp_id:emp_id},
            beforeSend: function(){
              $('.spiner-div').show();
              $('.div-blur').show();
            },
            complete: function(){
              $('.spiner-div').hide();
              $('.div-blur').hide();
            },
            success: function(data){
              if(data.status === 1){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Deleted',
                    text: data.message,
                    showConfirmButton: true
                })
                loadEnrollmentData();
              }else{
                Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Action Failed',
                  text: data.message,
                  showConfirmButton: true
                })
              }
                
            }
          })

         })


         
        $('.details').click(function(){
          let emp_id = $(this).prop('id');
          $('.content-div').load('pages/faculty/each_faculty.php', function(){
            // alert(emp_id);
            $('#emp_id_details').val(emp_id);
          })
        })

        //  $('.tableFaculty').on('click', '',  function(){
        //     let currentRow = $(this).closest("tr");
        //     let enId = currentRow.find('.assess').val();
        //     let appname = currentRow.find('#app_name').html();
        //     let lrn = currentRow.find('#app_lrn').html();
        //     let track = currentRow.find('#app_track').html();
        //     // console.log(enId);

        //     $('#applicant_emp_id').html(enId);
        //     $('#applicant_name').html(appname);
        //     $('#applicant_lrn').html(lrn);
        //     $('#track_title').html(track);


        //     $('#applicant_emp_id_input').val(enId);


        //     // console.log(enId);
        //  });//table click end
       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
     }//end of success........
   });//end of ajax ................
}





</script>
