

function getAdvisory(){
        let emp_id = $('#emp_id').val();
        $.ajax({
            url: 'advisery_class',
            method: 'get',
            dataType: 'json',
            data: {emp_id: emp_id},
            beforeSend: function(){
                $('.spiner-div').show();
                $('.div-blur').show();
            },
            complete: function(){
                $('.spiner-div').hide();
                $('.div-blur').hide();
            },
            success: function(data){
                // console.log(data.program);
                if(data.section == null){
                    if(data.shs_sec == null){
                        $('#t_section').text("Advisery (n/a)");
                    }else{
                        $('#t_section').text(data.shs_sec.shs_sec_title);
                    }
                }else{
                    $('#t_section').text(data.section.sec_title);
                }

                if(data.program == null){
                    if(data.shs_sec == null){
                        $('#t_program').text("Program/Strand (n/a)");
                    }else{
                        $('#t_program').text(data.shs_sec.strand_title);
                    }
                }else{
                    $('#t_program').text(data.program.program_title);
                }

                if(data.grade == null){
                    if(data.shs_sec == null){
                        $('#t_grade_level').text("Grade Level (n/a)");
                    }else{
                        $('#t_grade_level').text(data.shs_sec.grade_level);
                    }
                }else{
                    $('#t_grade_level').text(data.grade.grade_level);
                }

                $('#table_adv').off();
                $('#table_adv').DataTable().clear().destroy();
                $("#table_adv").DataTable({
                    "data": data.adv,
                    "responsive": false, 
                    "autoWidth": false,
                    "scrollX": true,
                     "destroy" : true,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    "columns": [
                        {
                            "data": null,
                            render: function (data, type, row, meta) {
                                return '<button class="btn  btn-xs btn-warning text-dark btnView" id="'+data.en_id+'">View</button>&nbsp;'+
                                '<button class="btn btn-xs btn-primary btnEmail" id="'+data.en_id+'">Email</button>';
                            }
                        },
                        {
                            "data": null,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"data": "student_id"},
                        {"data": "student_lrn"},
                        {"data": "last_name"},
                        {"data": "first_name"},
                        {"data": "middle_name"},
                        {"data": "sex"},
                        {"data": "birthdate"},
                        {"data": "phone_no"},
                        {"data": "email_address"},
                    ]

                }).buttons().container().appendTo('.col-md-6:eq(0)');

                $('#table_adv').on('click', '.btnView', function(){
                    // loadTo = 5;
                    let en_id = $(this).prop('id');
                    $('#student_profile_modal').modal('show');
                    $('#student_modal_body').load('pages/enrollment/each_student.php', function(){
                        $('.table-data-div').removeClass('col-md-12');
                        $('.table-data-div').addClass('col-md-4');
                        $('.data-div').show();
                        $('#expand_table').show();
                        $('.en_id').val(en_id);
                        $(".user_guide").hide();
                        $('.generate_pdf').hide();
                        $(".readme_div").hide();
                    }).fadeIn(500);
                    // $('#student_modal_body').css('color', 'black');
                })

            }
        })
      
}