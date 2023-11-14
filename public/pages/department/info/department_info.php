<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>Department Head: <span id="dept_head" style="font-weight: bold;"></span></p>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        loadDept();
    })

    function loadDept(){
        let dept_id = $('#dept_id_details').val();
        $.ajax({
            url: 'getDept',
            method: 'get',
            dataType: 'json',
            data: {dept_id: dept_id},
            beforeSend: function(){
                $('.spiner-div').show();
                $('.div-blur').show();
            },
            complete: function(){
                $('.spiner-div').hide();
                $('.div-blur').hide();
            },
            success: function(data){
                if(data.head.dept_head_id == null ){
                    $('#dept_head').text('Not assigned');
                }else{
                    $('#dept_head').text(data.head.title+'. '+data.head.emp_lname+', '+data.head.emp_fname+' '+data.head.emp_mname);
                }

            }
        })
    }

</script>