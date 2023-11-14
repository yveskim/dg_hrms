<form class="form" action="#" method="post" id=""></form>

        <div class="row ">
        <div class="col-md-12 portlet light bordered">
            <div class="row advisery_list">
            <div class="col-md-12">
                <table class="table table-hover table-bordered tblStrand table-sm" >
                <thead>
                    <tr>
                      <th>No.</th>
                      <th width="30%">Action</th>
                      <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){
        loadStrand();
    })

    function loadStrand(){
      let track_id = $('#track_id_details').val();
      // console.log(track_id);
      $.ajax({
        url: 'getStrand',
        method: 'get',
        dataType: 'json',
        data: {track_id:track_id},
        beforeSend: function(){
          $('.spiner-div').show();
          $('.div-blur').show();
        },
        complete: function(){
          $('.spiner-div').hide();
          $('.div-blur').hide();
        },
        success: function(data){
            // console.log(data.fac);
            $('.tblStrand').off();
            $('.tblStrand').DataTable().clear().destroy();
            $('.tblStrand').DataTable({
              "data": data.str,
              "responsive": false,
              "scrollX": true,
              "autoWidth": true,
              "destroy" : true,
              "paging" : false,
              "searching" : false,
              // "dom": 'lBfrtip',
              // "buttons": [
              //     'copy', 'csv', 'excel', 'pdf', 'print'
              //   ],
              "columns": [
      
                {
                    "data": null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                  "data": null,
                    render: function(data, type, row) {
                    return  '<button type="button" id="'+data.strand_id+'" class="btn btn-primary btn-lg track_details full-size" title="view details" style="width: 100%;">&nbsp;' + data.strand_title +' </button>';
                  }
                },
                {"data": "strand_description"}
             
              ]
            });//end of datatable
         //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

         $('.track_details').click(function(){
          let strand_id = $(this).prop('id');
            $('#strands').load('pages/track_strand/strands/each_strand.php', function(){
              $('#strand_id_details').val(strand_id);
            })
         })

      }
    })
}
</script>