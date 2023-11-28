

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

  #pending-text:hover, #status-text:hover{
    font-size: 110%;
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

  .toggle-vis{
    cursor: pointer;
    color: blue;
  }

  .table-xs{
    font-size: x-small;
  }

  .toggle-vis{
    color: darkblue;
  }
</style>
<div class="div-blur"></div>

<div class="spiner-div">
  <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>



<div class="row">
  <div class="col-12">
    <h1 class="title-text">VALIDATED APPLICATION</h1>
  </div>
</div><br><br>



<div class="row">
  <div class="col-md-2">
    <button class="btn btn-primary btn-option" type="button" name="button" id="allData">All Data</button>
  </div>
  </div>
</div>
<hr>



<div class="row">
  [Show/Hide Column]--  
  <a href="#" class="toggle-vis" data-column="2">Gender</a> --- 
  <a href="#" class="toggle-vis" data-column="3">LWD</a> --- 
  <a href="#" class="toggle-vis" data-column="4">P1</a> --- 
  <a href="#" class="toggle-vis" data-column="5">P2</a> --- 
  <a href="#" class="toggle-vis" data-column="6">P3</a> --- 
  <a href="#" class="toggle-vis" data-column="7">A1</a> ---
  <a href="#" class="toggle-vis" data-column="8">A2</a> ---
  <a href="#" class="toggle-vis" data-column="9">A3</a> ---
  <a href="#" class="toggle-vis" data-column="10">Date</a> ---
  <a href="#" class="toggle-vis" data-column="11">Remarks</a> ---
  <a href="#" class="toggle-vis" data-column="12">Status</a> --
  <a href="#" class="toggle-vis" data-column="13">Score</a> 
  <hr>
  <div class="col-md-12">
    <table class="table table-bordered table-hover table-striped tableApplication table-xs display compact" id="datatable-button">
      <thead>
        <tr>
          <th>ID</th>
          <th>Student</th>
          <th>Gender</th>
          <th>Is LWD</th>
          <th>P1</th>
          <th>P2</th>
          <th>P3</th>
          <th>A1</th>
          <th>A2</th>
          <th>A3</th>
          <th>App Date</th>
          <th>Remarks</th>
          <th>Status</th>
          <th>Score</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>


<div class="modal fade mb-4" id="modalEntranceExam">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="applicant_name"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="entranceExamForm"></form>
                <input type="hidden" id="score_application_id" name="score_application_id" form="entranceExamForm">
                <div class="row">
                  <div class="col-md-12">
                    <label for="">Exam Score</label>
                    <input type="number" step=".01" name="score" class="form-control" form="entranceExamForm" id="exam_score">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="Proceed" class="btn btn-primary form-control" form="entranceExamForm">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end of modalStatus-->

<script type="text/javascript">
  $(document).ready(function(){
  //  document.body.style.zoom = (window.innerWidth / window.outerWidth);
  //  document.body.style.zoom = "90%";
    $('.spiner-div').hide();
    $('.div-blur').hide();
    $('.filter_status_div').hide();

    $('.close-modal').click(function(){
       $('.tableStatus').DataTable().clear().destroy();
    });
    $('.modal').on('hidden.bs.modal', function(){
      $('.tableStatus').DataTable().clear().destroy();
    });
    $('#close_status').click(function(){
      $('.tableStatus').DataTable().clear().destroy();
    });
    //Post form ................................
    //loadAll data in application
    $('#allData').addClass('btn-active');
    var route_query = "getValidatedApp";
    loadPage(route_query);
    loadData();

    $('.shs_program_div').hide();
    $('.jhs_program_div').hide();
    $('.btn_submit_filter').hide();

 
 
});

function loadData(){
  //load pending application data
  $('#pending').click(function(){
      removeBtnClass();
      $('#pending').addClass('btn-active');
      $('.tableApplication').DataTable().clear().destroy();
      route_query = "pending";
      loadPage(route_query);
    });
  //load validated application data
  $('#validated').click(function(){
    removeBtnClass();
    $('#validated').addClass('btn-active');
    $('.tableApplication').DataTable().clear().destroy();
    route_query = "validated";
    loadPage(route_query);
  });
  //load declined application data
  $('#declined').click(function(){
    removeBtnClass();
    $('#declined').addClass('btn-active');
    $('.tableApplication').DataTable().clear().destroy();
    route_query = "declined";
    loadPage(route_query);
  });
  //load all data
  $('#allData').click(function(){
    removeBtnClass();
    $('#allData').addClass('btn-active');
    $('.tableApplication').DataTable().clear().destroy();
    route_query = "getValidatedApp";
    loadPage(route_query);
  });
}

function removeBtnClass(){
  $('#allData').removeClass('btn-active');
  $('#pending').removeClass('btn-active');
  $('#validated').removeClass('btn-active');
  $('#declined').removeClass('btn-active');
}

  function loadPage(route_query){
  //  var username = $(this).val();
    $.ajax({
     url: 'getApp/'+route_query,
     method: 'get',
     dataType: 'json',
	    beforeSend: function(){
        $('.spiner-div').show();
        $('.div-blur').show();
        $('#modalEntranceExam').modal('hide');
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
      },
      complete: function(){
        $('.spiner-div').hide();
        $('.div-blur').hide();

      },
     success: function(res){
      // console.log(data);
         $('.tableApplication').DataTable({
           "data": res.application,
           "responsive": true,
           "scrollX": true,
           "autoWidth": false,
		       "dom": 'lBfrtip',
			     "buttons": [
				      'copy', 'csv', 'excel', 'pdf', 'print'
			      ],
           "columns": [
             {"data": "application_id"},
             {
               "data": null,
               render: function(data, type, row) {
               return  data.firstname +" "+ 
                        data.middle_name +" "+ 
                        data.last_name +'</p>';
               }
             },
             {"data": "gender"},
             {"data": "is_lwd"},
             {"data": "program_first_choice"},
             {"data": "program_second_choice"},
             {"data": "program_third_choice"},
             {"data": "first_quarter_average"},
             {"data": "second_quarter_average"},
             {"data": "third_quarter_average"},
             {"data": "created_at"},
             {"data": "remarks"},
             {
               "data": null,
               render: function(data, type, row) {
                 if(data.status_info == null || data.status_info == ""){
                  return  "Pending";
                }
               }
             },
             {
               "data": null,
               render: function(data, type, row) {
                 if(data.score == null || data.score == ""){
                  return  "na";
                }else{
                  return data.score;
                }
               }
             },
             {
               "data": null,
               render: function(data, type, row) {
                return   '<form class="" action="checkAppFiles" id="checkAppForm" method="post" target="_blank"></form>'+
                '<i><button class="fa fa-circle-o-notch btn btn-success btn-xs add_exam_score" title="Add Score" data-toggle="modal" data-target="#modalEntranceExam" value="'+data.application_id+'" type="button"></button></i>'+
                '<input type="hidden" class="appName" value="'+data.firstname +" "+ data.middle_name +" "+ data.last_name +'">';

               }
             }
           ]
         });

        //TODO: finish this hide show table
        let table = $('.tableApplication').DataTable();
         $('a.toggle-vis').on('click', function (e) {
              e.preventDefault();

              // Get the column API object
              let column = table.column($(this).attr('data-column'));
              // Toggle the visibility
              column.visible(!column.visible());
          });

        $('.tableApplication').on('click', '.add_exam_score',  function(){
          let currentRow = $(this).closest("tr");
          let application_id = currentRow.find('.add_exam_score').val();
          let applicantName = currentRow.find('.appName').val();
          

          $('#applicant_name').text(applicantName);
          $('#score_application_id').val(application_id);
          // console.log(application_id);
          // console.log(applicantName);

        });//table click end

        $("#modalEntranceExam").on('hide.bs.modal', function(){
            $('#exam_score').val('');
        });
   
       //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>..
  
     }
    });
}

$('#entranceExamForm').submit(function(event){
    event.preventDefault();
    let user_id = $('#user').val();
    let formData = new FormData(this);
    formData.append('user_id', user_id);
    $.ajax({
        url: 'saveExamScore',
        method: 'post',
        dataType: 'json',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
          $('#modalEntranceExam').modal('hide');
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
          
        },
        success: function(res){
          // console.log(res);
          $('.tableApplication').DataTable().clear().destroy();
          loadPage("getAll");
          // loadData();

        }
    });
})

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
        heading: 'Process Failed',
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
        heading: 'Process Successfull',
        text: msg,
        showHideTransition: 'slide',
        icon: 'error',
        loderBg: '#f2a654',
        position: 'top-right'
      });
    }

    function requestDenied(msg){
    //  resetToastPosition();
      $.toast({
        heading: 'Process Denied',
        text: msg,
        showHideTransition: 'slide',
        icon: 'warning',
        loderBg: '#f2a654',
        position: 'top-right'
      });
    }

    function requestDenied2(msg){
    //  resetToastPosition();
      $.toast({
        heading: 'Process Denied',
        text: msg,
        showHideTransition: 'slide',
        icon: 'warning',
        loderBg: '#f2a654',
        position: 'top-right'
      });
    }
</script>
