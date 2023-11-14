
<br>
<div class="row bg-secondary" style="padding-top: .4rem; color: white;">
    <div class="col-md-12">
        <h2>EXISTING APPLICATION</h2>
    </div>
</div>
<br>
<div class="row data-content">
    
</div>

<div class="modal fade mb-4" id="modalViewApplication">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">View/Edit/Delete Application</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" >
                    <form action="" id="updateAppForm"></form>
                    <form action="" id="deleteApplicationForm"></form>
                
                    <div class="row bg-primary" style="padding: 1rem; color: white;">
                        <div class="col-md-8">
                            <h4>APPLICATION DETAILS</h4>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger btn-sm" id="delete_application" form="deleteApplicationForm" style="float:right;"><i class="bi-trash"></i>Delete</button>
                        </div>
                    </div>
                    <input type="hidden" name="application_id" id="application_id" form="updateAppForm">
                    <hr>
                    <div class="row" style="padding: 0 5rem 0 5rem;">
                        <div class="col-md-12">
                           <div class="row" >
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="last_school_year">Last Year Attended</label>
                                    <select class="form-control" id="last_school_year" name="last_school_year" form="updateAppForm" required>
                                        <option selected value="">---</option>
                                        <option value="2021-2022">2022-2023</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2017-2018">2017-2018</option>
                                        <option value="2016-2017">2016-2017</option>
                                        <option value="2015-2016">2015-2016</option>
                                        <option value="2014-2015">2014-2015</option>
                                        <option value="2013-2014">2013-2014</option>
                                        <option value="2012-2013">2012-2013</option>
                                        <option value="2011-2012">2011-2012</option>
                                        <option value="2010-2011">2010-2011</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="last_school_attended">Name of Last School Attended</label>
                                    <input type="text" class="form-control" id="last_school_attended" name="last_school_attended" form="updateAppForm" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="last_school_address">Last School Address</label>
                                    <input type="text" class="form-control" id="last_school_address" name="last_school_address" form="updateAppForm" required>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-1">
                                    <input class="checkbox-large" type="checkbox" name="is_lwd" id="is_lwd" value="1" form="updateAppForm" style="width: 1.5rem; height: 1.5rem;">
                                </div>
                                <div class="col-md-11">
                                    <label for="is_lwd">Check if you are a Learner With Disability <strong>(LWD)?</strong> </label>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="program_first_choice">First Choice</label>
                                    <select class="form-control" id="program_first_choice" name="program_first_choice" form="updateAppForm" required>
                                        <option selected value="">---</option>
                                        <option value="SPSTE">Special Program for Science Technology and Engineering (SPSTE)</option>
                                        <option value="STVEP">Strengthened Technological-Vocational Education Program (STVEP)</option>
                                        <option value="SSE">Smart School on Entrepreneurship (SSE)</option>
                                        <option value="SPJ">Special Program for Journalism (SPJ)</option>
                                        <option value="SPA">Special Program for Arts (SPA)</option>
                                        <option value="SPS">Special Program for Sports (SPS)</option>
                                        <option value="EOC">Evening Opportunity Class (EOC)</option>
                                        <option value="OHSP">Open High School Program (OHSP)</option>
                                        <option value="PSSN">Program for Students with Special Needs (PSSN)</option>
                                        <option value="REG">Regular Class (REG)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="program_second_choice">Second Choice</label>
                                    <select class="form-control" id="program_second_choice" name="program_second_choice" form="updateAppForm" required>
                                        <option selected value="">---</option>
                                        <option value="SPSTE">Special Program for Science Technology and Engineering (SPSTE)</option>
                                        <option value="STVEP">Strengthened Technological-Vocational Education Program (STVEP)</option>
                                        <option value="SSE">Smart School on Entrepreneurship (SSE)</option>
                                        <option value="SPJ">Special Program for Journalism (SPJ)</option>
                                        <option value="SPA">Special Program for Arts (SPA)</option>
                                        <option value="SPS">Special Program for Sports (SPS)</option>
                                        <option value="EOC">Evening Opportunity Class (EOC)</option>
                                        <option value="OHSP">Open High School Program (OHSP)</option>
                                        <option value="PSSN">Program for Students with Special Needs (PSSN)</option>
                                        <option value="REG">Regular Class (REG)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="program_third_choice">Third Choice</label>
                                    <select class="form-control" id="program_third_choice" name="program_third_choice" form="updateAppForm" required>
                                        <option selected value="">---</option>
                                        <option value="SPSTE">Special Program for Science Technology and Engineering (SPSTE)</option>
                                        <option value="STVEP">Strengthened Technological-Vocational Education Program (STVEP)</option>
                                        <option value="SSE">Smart School on Entrepreneurship (SSE)</option>
                                        <option value="SPJ">Special Program for Journalism (SPJ)</option>
                                        <option value="SPA">Special Program for Arts (SPA)</option>
                                        <option value="SPS">Special Program for Sports (SPS)</option>
                                        <option value="EOC">Evening Opportunity Class (EOC)</option>
                                        <option value="OHSP">Open High School Program (OHSP)</option>
                                        <option value="PSSN">Program for Students with Special Needs (PSSN)</option>
                                        <option value="REG">Regular Class (REG)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="">1st Quarter General Average</label>
                                    <input class="form-control" type="number" placeholder="0.00" required name="firstQuarter" id="firstQuarter" min="75" step="0.01" title="First Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="updateAppForm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="">2nd Quarter General Average</label>
                                    <input class="form-control" type="number" placeholder="0.00" required name="secondQuarter" id="secondQuarter" min="75" step="0.01" title="Second Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="updateAppForm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="">3rd Quarter General Average</label>
                                    <input class="form-control" type="number" placeholder="0.00" required name="thirdQuarter" id="thirdQuarter" min="75" step="0.01" title="Third Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="updateAppForm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" class="form-control" rows="3" cols="40" form="updateAppForm" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <hr>

                    <div class="row mb-4" style="padding: 0 5% 0 5%;">
                        <div class="col-md-6">
                            <button class="btn btn-default" type="button" style="width: 90%; border: 1px solid black;" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit" style="width: 90%;" form="updateAppForm"><i class="bi-pencil-square"></i>Update</button>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>




    
<div class="modal fade mb-4" id="modalViewTransferee">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View/Edit/Delete Application Transferee</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" >
                <form action="" id="updateTransfereeForm"></form>
                <form action="" id="deleteTransfereeForm"></form>
            
                <div class="row bg-warning" style="padding: 1rem; color: navyblue;">
                    <div class="col-md-8">
                        <h4>APPLICATION of TRANSFEREE DETAILS</h4>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-danger btn-sm" id="delete_transferee" form="deleteTransfereeForm" style="float:right;"><i class="bi-trash"></i>Delete</button>
                    </div>
                </div>
                <input type="hidden" name="transferee_id" id="transferee_id" form="updateTransfereeForm">
                <hr>
                <div class="row" style="padding: 0 5rem 0 5rem;">
                    <div class="col-md-12">
                        <div class="row" >
                            <div class="col-md-12 mb-4">
                                <label class="form-label" for="grade_level">Grade Level</label>
                                <select class="form-control" id="grade_level_t" name="grade_level" form="updateTransfereeForm" required>
                                    <option selected value="">---</option>
                                    <option value="G8">Grade 8</option>
                                    <option value="G9">Grade 9</option>
                                    <option value="G10">Grade 10</option>
                                    <option value="G11">Grade 11</option>
                                    <option value="G12">Grade 12</option>
                                </select>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-md-12 mb-4">
                                <label class="form-label" for="last_school_year">Last Year Attended</label>
                                <select class="form-control" id="last_school_year_t" name="last_school_year" form="updateTransfereeForm" required>
                                    <option selected value="">---</option>
                                    <option value="2021-2022">2022-2023</option>
                                    <option value="2021-2022">2021-2022</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2019-2020">2019-2020</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2017-2018">2017-2018</option>
                                    <option value="2016-2017">2016-2017</option>
                                    <option value="2015-2016">2015-2016</option>
                                    <option value="2014-2015">2014-2015</option>
                                    <option value="2013-2014">2013-2014</option>
                                    <option value="2012-2013">2012-2013</option>
                                    <option value="2011-2012">2011-2012</option>
                                    <option value="2010-2011">2010-2011</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="last_school_attended">Name of Last School Attended</label>
                                <input type="text" class="form-control" id="last_school_attended_t" name="last_school_attended" form="updateTransfereeForm" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="last_school_address">Last School Address</label>
                                <input type="text" class="form-control" id="last_school_address_t" name="last_school_address" form="updateTransfereeForm" required>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-1">
                                <input class="checkbox-large" type="checkbox" name="is_lwd" id="is_lwd_t" value="1" form="updateTransfereeForm" style="width: 1.5rem; height: 1.5rem;">
                            </div>
                            <div class="col-md-11">
                                <label for="is_lwd">Check if you are a Learner With Disability <strong>(LWD)?</strong> </label>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label" for="track_strand">Track/Strand <i>(For Grade 11 and 12 only)</i></label>
                                <select class="form-control" id="track_strand_t" name="track_strand" form="updateTransfereeForm">
                                  <option selected value="">---</option>
                                  <option value="STEM">Science, Technology, Engineering, and Mathematics</option>
                                  <option value="GAS">General Academics Strand</option>
                                  <option value="HUMSS">Humanities and Social Science</option>
                                  <option value="TVL-HE">Technical Vocational Livelihood (Home Economics)</option>
                                  <option value="TVL-ICT">Technical Vocational Livelihood (Information & Communication Technology)</option>
                                  <option value="ABM">Accountancy, Business and Management</option>
                                  <option value="AD">Arts and Design</option>
                                  <option value="ST">Sports Track</option>
                                  <option value="OHSP HUMSS">Open High School Program (HUMSS)</option>
                              </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="">General Average 1st Sem</label>
                                <input class="form-control" type="number" placeholder="0.00" required name="general_average_1st" id="general_average_1st_t" min="75" step="0.01" title="First Sem Average" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="updateTransfereeForm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="">General Average 2nd Sem</label>
                                <input class="form-control" type="number" placeholder="0.00" required name="general_average_2nd" id="general_average_2nd_t" min="75" step="0.01" title="Second Sem Average" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="updateTransfereeForm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" id="remarks_t" class="form-control" rows="3" cols="40" form="updateTransfereeForm" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <hr>

                <div class="row mb-4" style="padding: 0 5% 0 5%;">
                    <div class="col-md-6">
                        <button class="btn btn-default" type="button" style="width: 90%; border: 1px solid black;" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit" style="width: 90%;" form="updateTransfereeForm"><i class="bi-pencil-square"></i>Update</button>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#updateAppForm').submit(function(event){
            event.preventDefault();
            $.ajax({
                url: 'update_app_form',
                method: 'post',
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.spiner-div').show();
                    $('.div-main').addClass('faded');
                },
                complete: function() {
                    $('#modalViewApplication').modal('toggle');
                    $('.modal-backdrop').remove();
                    $('.spiner-div').hide();
                },
                error: function(err) {
                    console.log(err);
                },
                success: function(res) {
                    console.log(res);
                }
            })
        })

        $('#updateTransfereeForm').submit(function(event){
            event.preventDefault();
            $.ajax({
                url: 'updateTransferee',
                method: 'post',
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.spiner-div').show();
                    $('.div-main').addClass('faded');
                },
                complete: function() {
                    $('#modalViewTransferee').modal('toggle');
                    $('.modal-backdrop').remove();
                    $('.spiner-div').hide();
                },
                error: function(err) {
                    console.log(err);
                },
                success: function(res) {
                    console.log(res);
                }
            })
        })

        

        $('#deleteApplicationForm').submit(function(event){
            event.preventDefault();
            let confirmDelete = confirm('Are you sure you want to delete this application?');
            let formData = new FormData(this);
            let application_id = $('#application_id').val();
            formData.append('application_id', application_id);
            if(confirmDelete){
                $.ajax({
                    url: 'delete_application',
                    method: 'post',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.spiner-div').show();
                        $('.div-main').addClass('faded');
                    },
                    complete: function() {
                        $('#modalViewApplication').modal('toggle');
                        $('.modal-backdrop').remove();
                        $('.spiner-div').hide();
                        loadExistingApplication();
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(res) {
                        console.log(res);
                    }
                })
            }
           
        })

        $('#deleteTransfereeForm').submit(function(event){
            event.preventDefault();
            let confirmDelete = confirm('Are you sure you want to delete this application?');
            let formData = new FormData(this);
            let transferee_id = $('#transferee_id').val();
            formData.append('transferee_id', transferee_id);
            if(confirmDelete){
                $.ajax({
                    url: 'delete_transferee',
                    method: 'post',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.spiner-div').show();
                        $('.div-main').addClass('faded');
                    },
                    complete: function() {
                        $('#modalViewApplication').modal('toggle');
                        $('.modal-backdrop').remove();
                        $('.spiner-div').hide();
                        loadExistingApplication();
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(res) {
                        console.log(res);
                    }
                })
            }
           
        })
        
    })



</script>