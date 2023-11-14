  <!-- TRANSFEREE  -->

      <div class="row">
          <div class="preRegistration col-md-12">
              <div class="row">
                  <div class="col-md-5">
                      <h5 style="font-size: 2rem;">ONLINE PRE-REGISTRATION FORM FOR S.Y 2023-2024 (For transferees grade 8 to 11.)</h5>
                      <hr>
                      <p>Application Form for transferees grade 8 to 11 learners. This application
                          is subject for checking to be included in aptitude test (entrance exam). Fill up the form completely, make sure 
                          not to leave any information behind. Note: transferees of grade 7 to 10 can only be enrolled to regular class, for grade 11
                          applicants you need to choose for your track/strand to enroll.
                      </p>
                  </div>

                  <div class="col-md-7" style="border-left: 1px solid gray;">
                      <div class="row">
                          <div class="col-md-12 form-title bg-warning" style="text-align: center; padding-top: .5rem;">
                              <h3><strong>TRANSFEREE FORM</strong></h3>
                          </div>
                      </div>
                      <hr>

                      <form id="transferee_form" class="application-form" action="#" enctype="multipart/form-data"></form>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label class="form-label" for="grade_level">Grade Level to Apply</label>
                              <select class="form-control" id="grade_level" name="grade_level" form="transferee_form" required>
                                  <option selected value="">---</option>
                                  <option value="G8">Grade 8</option>
                                  <option value="G9">Grade 9</option>
                                  <option value="G10">Grade 10</option>
                                  <option value="G11">Grade 11</option>
                                  <option value="G12">Grade 12</option>
                              </select>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label class="form-label" for="academic_year">Academic Year to Apply</label>
                              <select class="form-control" id="academic_year" name="academic_year" form="transferee_form" required>
                                  <option selected value="">---</option>
                                  <option value="2023-2024">2023-2024</option>
                              </select>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label class="form-label" for="last_school_year">Last Year Attended</label>
                              <select class="form-control last_school_year" id="" name="last_school_year" form="transferee_form" required>
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
                                  <option value="other">other</option>
                              </select>
                          </div>
                      </div>

                      <div class="row last_school_year_other_div" id="">
                          <div class="col-md-12 mb-4">
                              <label for="last_school_year_other">Other</label>
                              <input type="text" class="form-control" id="last_school_year_other" form="transferee_form" name="last_school_year_other" placeholder="write here if the year is not in the list e.g(2001-2002)">
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label for="last_school_attended">Name of Last School Attended</label>
                              <input type="text" class="form-control" id="last_school_attended" name="last_school_attended" form="transferee_form" required>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label for="last_school_address">Last School Address</label>
                              <input type="text" class="form-control" id="last_school_address" name="last_school_address" form="transferee_form" required>
                          </div>
                      </div>
                      <hr>

                      <div class="row mb-4">
                          <div class="col-md-1">
                              <input class="checkbox-large" type="checkbox" name="is_lwd" id="is_lwd" value="1" form="transferee_form" style="width: 1.5rem; height: 1.5rem;">
                          </div>
                          <div class="col-md-11">
                              <label for="is_lwd">Check if you are a Learner With Disability <strong>(LWD)?</strong> </label>
                          </div>
                      </div>
                      <hr>

                      <div class="row">

                          <div class="col-md-12">
                              <p class="">Owned Educational Gadgets <i>(check all that applies)</i> </p>
                          </div>

                          <div class="col-md-12">
                              <ol class="gadget-option-ol">
                                  <li>
                                      <div class="form-check li-options">
                                          <input type="checkbox" class="checkbox-large" value="1" name="computer" id="computer1" form="transferee_form">
                                          <label class="form-check-label" for="computer1">Computer (Laptop/Desktop)</label>
                                      </div>
                                  </li><br>
                                  <li>
                                      <div class="form-check li-options">
                                          <input type="checkbox" class="checkbox-large" value="1" name="smart_phone" id="smart_phone1" form="transferee_form">
                                          <label class="form-check-label" for="smart_phone1">Smart Phone/Tablet</label>
                                      </div>
                                  </li><br>
                                  <li>
                                      <div class="form-check li-options">
                                          <input type="checkbox" class="checkbox-large" value="1" name="internet" id="internet1" form="transferee_form">
                                          <label class="form-check-label" for="internet1">Internet (Stable and Postpaid)</label>
                                      </div>
                                  </li><br>
                                  <li>
                                      <div class="form-check li-options">
                                          <input type="checkbox" class="checkbox-large" value="1" name="accessories"  id="accessories1" form="transferee_form">
                                          <label class="form-check-label" for="accessories1">Accesories (Microphone, Speakers, Webcam)</label>
                                      </div>
                                  </li>
                              </ol>
                          </div>
                      </div>
                      <hr>

                      <div class="row">
                          <div class="col-md-12">
                              <label class="form-label" for="track_strand">Track/Strand <i>(For Grade 11 and 12 only)</i></label>
                              <select class="form-control" id="track_strand" name="track_strand" form="transferee_form">
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
                      <hr>

                      <div class="row">
                          <div class="col-md-12">
                              <h4>School Grades Information</h4>
                              <p>Encode the grades needed for assessment. Do not leave any information to avoid disqualification in the program applied.</p>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label for="">1st Semester General Average</label>
                              <input class="form-control" type="number" placeholder="0.00" required name="firstQuarter" min="75" step="0.01" title="First Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="transferee_form">
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label for="">2nd Semester General Average</label>
                              <input class="form-control" type="number" placeholder="0.00" required name="secondQuarter" min="75" step="0.01" title="Second Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="transferee_form">
                          </div>
                      </div>
                      <hr>

                      <div class="row">
                          <div class="col-md-12 mb-4">
                              <label for="remarks">Remarks <i> (Write a notice on important matters or concerns regarding the application (documents, conditions, special needs, etc.) of the learner. Otherwise write none or leave it blank.</i></label>
                              <textarea name="remarks" class="form-control" rows="3" cols="40" form="transferee_form" ></textarea>
                          </div>
                      </div>
                      <hr>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h4 style="color: orange; text-align: center;"><strong>NOTICE OF WARNING for FALSIFICATION of DATA and INFORMATION</strong></h4>
                                  </div>
                                  <div class="col-md-12" style="text-align: justify;">
                                      <p>Iloilo National High School values the compliance for and provision of truthful data and information by applicants, which are of important bases for admission. Thus, the institution warns all interested individuals or parties against falsification of submitted data and information.</p>
                                      <p>A proven violation of the protocol by an individual shall be grounds for denial or termination of any possible privilege that may be due him/her.</p>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="row" style="background-color: orange; padding-top: 1rem; padding-bottom: 1rem;">
                          <div class="col-md-2">
                              <input type="checkbox" class="form-control checkbox-large notice" id="notice-chk2" form="transferee_form" required>
                          </div>
                          <div class="col-md-10">
                              <label class="form-check-label" for="notice-chk2">Yes, I read and understand the terms and condition written in <strong>"notice of warning for falsification of data and information"</strong>.</label>
                          </div>
                      </div>

                      <hr>

                      <div class="row btn-submit">
                          <div class="col-md-12">
                              <button type="submit" class="form-control btn btn-primary responsive-width" id="btnSubmitFormAppTransferee" name="button" form="transferee_form" style="font-size: 3rem;">Submit Application</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

<!-- TRANSFEREE END -->

<script>
    $('.last_school_year_other_div').hide();
    $('.last_school_year').change(function() {
        if ($(this).val() == 'other') {
            $('.last_school_year_other_div').show();
        } else {
            $('.last_school_year_other_div').hide();
        }
    });


    $('#transferee_form').submit(function(event){
      event.preventDefault();
      let formData = new FormData(this);
      let applicant_id = $('#applicant_id').val();
      formData.append('applicant_id', applicant_id);
      $.ajax({
        url: 'submit_transferee_form',
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
            $('#modalSelectApplication').modal('toggle');
            $('.modal-backdrop').remove();
            $('.spiner-div').hide();
            loadExistingApplication();
            $('.btn-menu').removeClass('btn-warning');
            $('.btn-menu').addClass('btn-info');
            $('#btnExistingApplication').addClass('btn-warning');
        },
        success: function(res) {
            if (res.status == 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data Saved successfuly ',
                    text: res.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Action Failed',
                    text: res.message
                });
            }//end ifelse
        },
        error: function(err) {
            console.log(err);
        }
      })
    })




</script>