
<div class="row">
    <div class="col-8">
    <h4>SG Information</h4>
    </div>
</div>
    <div class="row ">
    <div class="col-md-12 portlet light bordered">
        <div class="row">
          <div class="col-md-6">
            <label for="">Subject Group Head</label>
            <input type="text" class="form-control" readOnly id="sg_gh">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <label for="">Subject Group</label>
            <input type="text" class="form-control" readOnly id="sg_subject">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <label for="">Group</label>
            <input type="text" class="form-control" readOnly id="sg_group">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <label for="">Description</label>
            <textarea readOnly class="form-control" id="sg_description" cols="30" rows="10"></textarea>
          </div>
        </div>
    </div>
    </div>


<script>
    $(document).ready(function(){
          loadInfo();
    });

    function loadInfo(){
      let sg_id = $('#sg_id_details').val();
      // console.log(sg_id);
      $.ajax({
        url: 'getSgInfo',
        method: 'get',
        dataType: 'json',
        data: {sg_id:sg_id},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
          // console.log(data);
          if(data.sg.emp_id === null){
            $('#sg_gh').val('n/a');
          }else{
            $('#sg_gh').val(data.sg.emp_lname +', '+ data.sg.emp_fname +' '+ data.sg.emp_mname);
          }
          $('#sg_subject').val(data.sg.sg_subject);
          $('#sg_group').val(data.sg.sg_group);
          $('#sg_description').val(data.sg.sg_description);

      }
    })
}

</script>