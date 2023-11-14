<style media="screen">
    #modalStat td,
    #modalStat th {
        color: black;
    }

    .tblProfile {
        padding: 1%;
    }

    .div-form-content {
        box-shadow: 1px 1px 5px 2px gray;
        padding: 0 2rem 0 2rem;
    }

    body,
    tr,
    td {
        color: rgb(0, 81, 135);
    }


    .spiner-div {
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

    .btn-shadow {
        box-shadow: .2rem .2rem gray;
    }

    .btn-border {
        border: .1rem solid gray;
    }

    .ma-left {
        margin-left: 2rem;
        padding-left: 1rem;
        width: 8rem;
    }

    .full-size {
        width: 100%;
    }

    .tab-pane {
        padding: 2rem;
    }


    /* when not active use specificity to override the !important on border-(color) */
    .nav-tabs .nav-link:not(.active) {
        border-color: transparent !important;
    }

    .li-options {
        white-space: nowrap;
        overflow: auto;
    }

    .li-options input {
        width: 1.5rem;
        height: 1.5rem;
        margin-right: 1rem;
    }

    .profile-title{
        background-image: url('upload/system_file/main_background.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        z-index: -100;       
        background-color: rgba(0, 19, 119, 0.7);;
        background-blend-mode:color-burn; 
        color: white;
        padding-top: 2%;
        padding-bottom: 2%;
        margin: 0;
        position:static;
        
        
    }

    .btn-menu{
        height: 5rem;
        font-size: 1.4rem;
        text-align: center;
        justify-content: center;
        vertical-align: middle;
    }



</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<div class="spiner-div">
    <img src="upload/system_file/logo_gif.gif" alt="logo_gif">
</div>
<br>
<hr>

<form id="form_app" action="getAppForm" method="GET" enctype='multipart/form-data'></form>
<div class="content">
    <!-- <input type="text" name="" value="" id="input-trigger" style="width: 2em; float:right;"> -->
    <div class="row mb-4">
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12 mb-1"> <a href="login_application" class="btn btn-warning full-size btn-shadow btn-menu" style=" padding-top: 1.5rem;">PROFILE</a> </div>
                <div class="col-md-12 mb-1"> 
                    <button class="btn btn-info full-size btn-shadow btn-menu" id="btnExistingApplication">
                        EXISTING APPLICATION
                    </button> 
                </div>
                <div class="col-md-12 mb-1"> <button class="btn btn-info full-size btn-shadow btn-menu" id="btn_document">DOCUMENTS</button> </div>
            </div>
        </div>
        <div class="col-md-8 div-form-content">
            <input style="width: 100%;" type="hidden" value="<?php echo $profile_pic_name['random_filename']; ?>" id="profile_pic_random_name"><!--reference pic name-->
            <br>
            <div class="row profile-title">
                <div class="col-md-7">
                    <h2>PROFILE</h2>
                </div>
                <div class="col-md-1" style="padding-top: 13%;">
                    <i type="button" class="bi-camera-fill" style="font-size: 3rem; opacity: .8;" id="upload-pic-btn" data-toggle="modal" data-target="#modal-upload-pic"></i>
                </div>
                <div class="col-md-4">
                    <img src=" 
                        <?php
                        if (empty($profile_pic_name['random_filename'])) {
                            echo 'upload/system_file/noimage.png';
                        } else {
                            echo 'upload/applicants_profile_image/' . $profile_pic_name['random_filename'];
                        }
                        ?>" id="profile_pic_src" alt="noimage" style="width: 12rem; height: 12rem; border: 2px solid gray; border-radius: .5rem;  object-fit: cover;">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-9"><h3><strong>PEROSNAL INFORMATION</strong></h3></div>
                <div class="col-md-3">
                    <button class="btn btn-primary full-size" id="btn_edit_profile" data-toggle="modal" data-target="#modalEditProfile"><i class="bi-pencil-square"></i> Edit</button>
                </div>
            </div>
            <br>
            <table class="table tblProfile  table-bordered">
                <tr>
                    <th scope="col">Learners Identification Number (LRN)</th>
                    <td>
                        <?php echo $applicants['applicant_lrn'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">First Name</th>
                    <td>
                        <?php echo $applicants['firstname'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Middle Name</th>
                    <td>
                        <?php echo $applicants['middle_name'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Last Name</th>
                    <td>
                        <?php echo $applicants['last_name'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Gender</th>
                    <td>
                        <?php echo $applicants['gender'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Birthday</th>
                    <td>
                        <?php echo $applicants['birthdate'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Phone</th>
                    <td>
                        <?php echo $applicants['phone'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td>
                        <?php echo $applicants['email'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Current Address</th>
                    <td>
                        <?php echo $applicants['cur_street'] . ', ' . $applicants['cur_subdivision'] . ', ' . $applicants['cur_barangay'] . ', ' . $applicants['cur_city'] . ', ' . $applicants['cur_province'] ?>
                    </td>
                </tr>
                <tr>
                    <th scope="col">Permanent Address</th>
                    <td>
                        <?php echo $applicants['per_street'] . ', ' . $applicants['per_subdivision'] . ', ' . $applicants['per_barangay'] . ', ' . $applicants['per_city'] . ', ' . $applicants['per_province'] ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <br>
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalSelectApplication" style="font-size: 1.5rem; font-weight: bold;">
                        SELECT APPLICATION
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: left; box-shadow: 3px 3px 5px 1px gray; padding: 1rem; ">
                    <h6>Applicants Profile</h6>
                    <p>This is your INHS pre-registration account. You can choose your application in the Select Application button.
                        You can check your existing application in the existing application tab and upload a document in the document tab. 
                        If you are done with your application, please wait for the verification of the admin. 
                        Check you application daily for the updates and schedules.
                    </p>
                </div>
            </div>

        </div>
    </div>


    <br><br>
    <hr style="width: 100%; height: .5em; background-color: white;">

    <div class="modal fade" id="modalSelectApplication" tabindex="-1" aria-labelledby="selectApplication" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SELECT APPLICATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-left: 2rem; padding-right: 2rem;">
                    <div class="row mb-2" style="margin-left: .5rem;">

                        <div class="container  py-2">
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border border-info border-bottom-0" id="pre-registration" data-toggle="tab" href="#preRegistration" role="tab" aria-controls="preRegistration" aria-selected="false">Online Pre-registration</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="transferee-tab" data-toggle="tab" href="#transferee" role="tab" aria-controls="transferee" aria-selected="false">Transferee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Current Student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Balik-aral</a>
                                </li>
                            </ul>

                            <div class="tab-content h-75">

                                <!-- NEW STUDENT  -->

                                <div class="tab-pane active border border-info" id="preRegistration" role="tabpanel" aria-labelledby="preRegistration">
                                    <div class="row">
                                        <div class="preRegistration col-md-12">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h5 style="font-size: 2rem;">ONLINE PRE-REGISTRATION FORM FOR S.Y 2023-2024 (Incoming grade 7 only.)</h5>
                                                    <hr>
                                                    <p>Application Form for incoming grade 7 learners. This application
                                                        is subject for checking to be included in aptitude test (entrance exam). Fill up the form completely, make sure 
                                                        not to leave any information behind. Note that you have three (3) program you choose from, the first program is your
                                                        priority choice and in any case that you cannot be qualified you will be automaticaly forwarded to your second choice.
                                                    </p>
                                                </div>

                                                <div class="col-md-7" style="border-left: 1px solid gray;">
                                                    <div class="row">
                                                        <div class="col-md-12 form-title bg-primary" style="text-align: center; color: white; padding-top: .5rem;">
                                                            <h3><strong> APPLICATION FORM </strong></h3>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <form id="app_form" class="application-form" action="#" enctype="multipart/form-data"></form>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label class="form-label" for="academic_year">Academic Year to Apply</label>
                                                            <select class="form-control" id="academic_year" name="academic_year" form="app_form" required>
                                                                <option selected value="">---</option>
                                                                <option value="2023-2024">2023-2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label class="form-label" for="last_school_year">Last Year Attended</label>
                                                            <select class="form-control last_school_year" id="" name="last_school_year" form="app_form" required>
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
                                                            <input type="text" class="form-control" id="last_school_year_other" form="app_form" name="last_school_year_other" placeholder="write here if the year is not in the list e.g(2001-2002)">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label for="last_school_attended">Name of Last School Attended</label>
                                                            <input type="text" class="form-control" id="last_school_attended" name="last_school_attended" form="app_form" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label for="last_school_address">Last School Address</label>
                                                            <input type="text" class="form-control" id="last_school_address" name="last_school_address" form="app_form" required>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row mb-4">
                                                        <div class="col-md-1">
                                                            <input class="checkbox-large" type="checkbox" name="is_lwd" id="is_lwd" value="1" form="app_form" style="width: 1.5rem; height: 1.5rem;">
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
                                                                        <input type="checkbox" class="checkbox-large" value="1" name="computer" id="computer" form="app_form">
                                                                        <label class="form-check-label" for="computer">Computer (Laptop/Desktop)</label>
                                                                    </div>
                                                                </li><br>
                                                                <li>
                                                                    <div class="form-check li-options">
                                                                        <input type="checkbox" class="checkbox-large" value="1" name="smart_phone" id="smart_phone" form="app_form">
                                                                        <label class="form-check-label" for="smart_phone">Smart Phone/Tablet</label>
                                                                    </div>
                                                                </li><br>
                                                                <li>
                                                                    <div class="form-check li-options">
                                                                        <input type="checkbox" class="checkbox-large" value="1" name="internet" id="internet" form="app_form">
                                                                        <label class="form-check-label" for="internet">Internet (Stable and Postpaid)</label>
                                                                    </div>
                                                                </li><br>
                                                                <li>
                                                                    <div class="form-check li-options">
                                                                        <input type="checkbox" class="checkbox-large" value="1" name="accessories"  id="accessories" form="app_form">
                                                                        <label class="form-check-label" for="accessories">Accesories (Microphone, Speakers, Webcam)</label>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-2">
                                                            <p>Read the following requirements of the Curricular Offerings</p>
                                                            <ul>
                                                                <li>SPSTE - General average of 85 or higher</li>
                                                                <li>STVEP - General average of 85 or higher</li>
                                                                <li>SSE - General average of 85 or higher</li>
                                                                <li>SPJ - General average of 85 or higher</li>
                                                                <li>SPA - General average of 85 or higher</li>
                                                                <li>SPS - General average of 85 or higher</li>
                                                                <li>OHSP - General average of 85 or higher</li>
                                                                <li>PSSN - General average of 85 or higher</li>
                                                            </ul>

                                                        </div> 
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>Please choose three (3) programs of your choice. Note that your options will be the priority program to be assigned. Please read the program requirements above.</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label class="form-label" for="program_first_choice">First Choice</label>
                                                            <select class="form-control" id="program_first_choice" name="program_first_choice" form="app_form" required>
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
                                                            <select class="form-control" id="program_second_choice" name="program_second_choice" form="app_form" required>
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
                                                            <select class="form-control" id="program_third_choice" name="program_third_choice" form="app_form" required>
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
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>School Grades Information</h4>
                                                            <p>Encode the grades needed for assessment. Do not leave any information to avoid disqualification in the program applied.</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label for="">1st Quarter General Average</label>
                                                            <input class="form-control" type="number" placeholder="0.00" required name="firstQuarter" min="75" step="0.01" title="First Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="app_form">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label for="">2nd Quarter General Average</label>
                                                            <input class="form-control" type="number" placeholder="0.00" required name="secondQuarter" min="75" step="0.01" title="Second Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="app_form">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label for="">3rd Quarter General Average</label>
                                                            <input class="form-control" type="number" placeholder="0.00" required name="thirdQuarter" min="75" step="0.01" title="Third Quarter Grade" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" form="app_form">
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <label for="remarks">Remarks <i> (Write a notice on important matters or concerns regarding the application (documents, conditions, special needs, etc.) of the learner. Otherwise write none or leave it blank.</i></label>
                                                            <textarea name="remarks" class="form-control" rows="3" cols="40" form="app_form" ></textarea>
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
                                                            <input type="checkbox" class="form-control checkbox-large notice" id="notice-chk" form="app_form" required>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label class="form-check-label" for="notice-chk">Yes, I read and understand the terms and condition written in <strong>"notice of warning for falsification of data and information"</strong>.</label>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row btn-submit">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="form-control btn btn-primary responsive-width" id="btnSubmitFormApp" name="button" form="app_form" style="font-size: 3rem;">Submit Application</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane border border-info" id="transferee" role="tabpanel" aria-labelledby="transferee-tab">
                                    
                                </div>
                                <div class="tab-pane border border-info" id="messages" role="tabpanel" aria-labelledby="messages-tab">Not yet available, Please wait for the school schedule...</div>
                                <div class="tab-pane border border-info" id="settings" role="tabpanel" aria-labelledby="settings-tab">Not yet available, Please wait for the school schedule...</div>
                            </div>

                            <!-- NEW STUDENT END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal fade mb-4" id="modal-upload-pic">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upload Profile Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" id="image_form"></form>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>PLEASE READ!</h6>
                            <p>PLEASE FOLLOW THE PHOTO REQUIREMENTS BELOW:</p>
                            <p><i>Any account that does not follow the requirements below will be subjected for deletion
                                    by the admin. </i></p>
                            <ol>
                                <li>The image in the photo must be the account holder.</li>
                                <li>The photo must be colored and in plain white background.</li>
                                <li>The photo must be taken within the last six (6) months.</li>
                                <li>The applicant must wear any decent attire, no wearing of sleeveless or see through
                                    dress.</li>
                                <li>The photo must be in full-face view directly facing the camera.</li>
                            </ol>
                            <hr style="border: 2px solid gray; background-color: gray;">
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="row" style="margin-left: 1.5rem;">
                                <div class="col-md-6 mb-4">
                                    <p>Sample Photo</p>
                                    <div style="width: 10rem; height: 12rem; box-shadow: 2px 2px 4px 1px gray; border: 3px solid gray;">
                                        <img src="upload/system_file/sample_image.jpg" alt="sample image" style="width: 100%; height: 100%; object-fit: cover">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p for="">Chosen Photo</p>
                                    <div style="width: 10rem; height: 12rem; box-shadow: 2px 2px 4px 1px gray; border: 3px solid gray;">
                                        <img src="upload/system_file/noimage.png" alt="chosen image" id="chosen-image" style="width: 100%; height: 100%; object-fit: cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Browse Image</label>
                            <input type="file" class="form-control" id="profile-input" name="profile_image" form="image_form">
                            <!-- <input type="text" class="form-control" id="account_id" name="account_id" form="image_form"> -->
                        </div>
                    </div>
                    <hr>

                    <div class="row mb-4">
                        <div class="col-md-12" style="padding: 0 15% 5% 15%;">
                            <button class="btn btn-primary" type="submit" style="width: 100%;" form="image_form">Upload</button>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="modal fade mb-4" id="modalEditProfile">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" id="editProfileForm"></form>
                    <div class="row" id="edit_profile_content" style="padding: 0 4% 0 4%;">

                    </div>


                </div>


            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(window).on('load', function() {
            $('.spiner-div').hide();
            $('.div-main').removeClass('faded');
        });

        $(document).ready(function() {
            $('#account_id').val($('#applicant_id').val());


            $("html, body").animate({
                scrollTop: 0
            }, "slow");

            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            $('.last_school_year_other_div').hide();
            $('.last_school_year').change(function() {
                if ($(this).val() == 'other') {
                    $('.last_school_year_other_div').show();
                } else {
                    $('.last_school_year_other_div').hide();
                }
            });
            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

            programSelection(); //choosing program algorithm


        });

        $('.btn-menu').click(function(){
            $('.btn-menu').addClass('btn-info');
            $('.btn-menu').removeClass('btn-warning');
            $(this).addClass('btn-warning');
        })

        $('#upload-pic-btn').click(function() {

        })

        // image view +++++++++++++++++++++++++++++

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#chosen-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#profile-input').change(function() {
            readURL(this);
        })

        //image view ----------------------------------



        $('#image_form').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let applicant_id = $('#applicant_id').val();
            let profile_pic_src = $('#profile_pic_src').prop('src');
            let profile_pic_random_name = $('#profile_pic_random_name').val();
            formData.append('applicant_id', applicant_id);
            formData.append('profile_pic_src', profile_pic_src); //append the profile pic source as reference to query
            formData.append('profile_pic_random_name', profile_pic_random_name); //append the current random name of pic as reference for updating main profile

            $.ajax({
                url: 'update_profile_pic',
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
                    $('#modal-upload-pic').modal('toggle');
                    $('.modal-backdrop').remove();
                    $('.spiner-div').hide();
                },
                success: function(res) {

                    if (res.status == 1) {
                        let random_filename = res.random_filename;
                        $('#profile_pic_src').prop('src', 'upload/applicants_profile_image/' + random_filename);
                        $('#profile_pic_random_name').val(random_filename);
                        console.log(random_filename);
                        console.log(res.message);
                    } else {
                        console.log(res.message)
                    }

                },
                error: function(err) {
                    console.log(err);
                }
            });
        })

        $('#app_form').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let applicant_id = $('#applicant_id').val();
            formData.append('applicant_id', applicant_id);
            $.ajax({
                url: 'submit_app_form',
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
                            title: 'Data validated successfuly ',
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
            });
        })


        function scrollElement(elem) {
            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            var el = elem;
            var elOffset = el.offset().top;
            var elHeight = el.height();
            var windowHeight = $(window).height();
            var offset;

            if (elHeight < windowHeight) {
                offset = elOffset - ((windowHeight / 2) - (elHeight / 2));
            } else {
                offset = elOffset;
            }
            var speed = 700;
            $('html, body').animate({
                scrollTop: offset
            }, speed);
            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        }

        function programSelection() {
            let choice1 = $('#program_first_choice');
            let choice2 = $('#program_second_choice');
            let choice3 = $('#program_third_choice');

            $('#program_first_choice').change(function() {
                if ($(this).val() == choice2.val() || $(this).val() == choice3.val()) {
                    alert('You can\'t choose thesame program, please choose another option');
                    $(this).prop('selectedIndex', 0);
                }
            })

            $('#program_second_choice').change(function() {
                if ($(this).val() == choice1.val() || $(this).val() == choice3.val()) {
                    alert('You can\'t choose thesame program, please choose another option');
                    $(this).prop('selectedIndex', 0);
                }
            })

            $('#program_third_choice').change(function() {
                if ($(this).val() == choice1.val() || $(this).val() == choice2.val()) {
                    alert('You can\'t choose thesame program, please choose another option');
                    $(this).prop('selectedIndex', 0);
                }
            })
        }


        function loadExistingApplication(){
            $('.div-form-content').load('pages/application/existing_application/existing_app.php', function(){
                $(this).css('opacity',0).stop().animate({"opacity": 1});//load page smoothly
                let applicant_id = $('#applicant_id').val();
                $.ajax({
                    url: 'loadExistingTransaction',
                    method: 'get',
                    dataType: 'json',
                    data: {'applicant_id': applicant_id},
                    beforeSend: function() {
                        $('.spiner-div').show();
                        $('.div-main').addClass('faded');
                    },
                    complete: function() {
                        $('.spiner-div').hide();
                        $('.div-main').removeClass('faded');
                    },
                    success: function(res) {

                        let count = 0;
                        // console.log(res);
                        
                        $.each(res.application, function(key, val){
                            count++;

                            let status = "";
                            if(val.status_info == null){
                                status = "Pending";
                            }else{
                                status = val.status_info;
                            }

                            $('.data-content').append(
                                '<form action="print_application" method="get" id="print_pdf_application" target="_blank"></form>'+
                                '<table class="table table-bordered table-sm table-compact" style="border-bottom: 3rem solid gray; padding: 0;">'+
                                '<tr>'+
                                    '<th>Application No.</th>'+
                                    '<td>'+
                                        '<span style="color: green; float:left">'+val.application_id+'</span>'+
                                        '<button class="btn btn-primary btn-sm btn-view-application" id="'+val.application_id+'" value="'+val.application_id+'" style="width: 20%; margin-left: 50%;" data-toggle="modal" data-target="#modalViewApplication"><i class="bi-binoculars"></i>'+ 
                                            'Edit'+
                                        '</button>'+
                                        
                                        '<button type="submit" class="btn btn-warning btn-sm btn-print-application" id="'+val.application_id+'" name="application_id" value="'+val.application_id+'" style="width: 20%; margin-left: 1em;" form="print_pdf_application"><i class="bi-printer"></i>'+ 
                                            'Print'+
                                        '</button>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Application Type</th>'+
                                    '<td><strong style="color: blue;">Pre-registration</strong></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Status</th>'+
                                    '<td><span style="color: orange">'+status+'</span></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Application Date & Time</th>'+
                                    '<td>'+val.created+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Accademic Year</th>'+
                                    '<td>'+val.academic_year+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Program First Choice</th>'+
                                    '<td style="color: orange; font-weight: bold">'+val.program_first_choice+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Program Second Choice</th>'+
                                    '<td style="color: orange; font-weight: bold">'+val.program_second_choice+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Program Third Choice</th>'+
                                    '<td style="color: orange; font-weight: bold">'+val.program_third_choice+'</td>'+
                                '</tr>'+
                                '</table>'+
                                '<br/>'
                            );
                        
                        })

                        if(count <= 0){
                            $('.data-content').append('<div class="col-md-12"><center><p>No Application Available for Pre-registration</p></center></div>');
                            // console.log(count);
                        }

                        // -------------------------------------------------------------------------------------------------


                        $.each(res.transferee, function(key, val){
                            count++;

                            let status = "";
                            if(val.status_info == null){
                                status = "Pending";
                            }else{
                                status = val.status_info;
                            }

                            $('.data-content').append(
                                '<form action="print_application_transferee" method="get" id="print_pdf_application_transferee" target="_blank"></form>'+
                                '<table class="table table-bordered table-sm table-compact" style="border-bottom: 3rem solid gray; padding: 0;">'+
                                '<tr>'+
                                    '<th>Application No.</th>'+
                                    '<td>'+
                                    '<span style="color: green; float:left">'+val.transferee_id+'</span>'+
                                        '<button class="btn btn-primary btn-sm btn-view-transferee" id="'+val.transferee_id+'" value="'+val.transferee_id+'" style="width: 20%; margin-left: 50%;" data-toggle="modal" data-target="#modalViewTransferee">'+
                                            '<i class="bi-binoculars"></i> Edit'+
                                        '</button>'+

                                        '<button type="submit" class="btn btn-warning btn-sm btn-print-application" id="'+val.transferee_id+'" name="transferee_id" value="'+val.transferee_id+'" style="width: 20%; margin-left: 1em;" form="print_pdf_application_transferee"><i class="bi-printer"></i>'+ 
                                            'Print'+
                                        '</button>'+
                                    '</td>'+
                                
                                '</tr>'+
                                '<tr>'+
                                    '<th>Application Type</th>'+
                                    '<td><strong style="color: blue;">Transferee</strong></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Grade Level</th>'+
                                    '<td>'+val.grade_level+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Status</th>'+
                                    '<td><span style="color: orange">'+status+'</span></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Application Date & Time</th>'+
                                    '<td>'+val.created+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Accademic Year</th>'+
                                    '<td>'+val.academic_year+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>Track/Strand</th>'+
                                    '<td style="color: orange; font-weight: bold">'+val.program+'</td>'+
                                '</tr>'+
                                '</table>'+
                                '<br/>'
                            );
                        
                        })

                        if(count <= 0){
                            $('.data-content').append('<div class="col-md-12"><center><p>No Application Available for Transferee</p></center></div>');
                            // console.log(count);
                        }

                        $('.btn-view-application').click(function(){
                            let application_id = $(this).prop('id');
                            $.ajax({
                                url: 'editApplication',
                                method: 'get',
                                dataType: 'json',
                                data: {'application_id': application_id},
                                success: function(res) {
                                    // console.log(res.application);
                                    $('#delete_application').val(res.application.application_id);
                                    $('#application_id').val(res.application.application_id);
                                    $('#last_school_year').val(res.application.last_school_year);
                                    $('#last_school_attended').val(res.application.last_school_attended);
                                    $('#last_school_address').val(res.application.last_school_address);
                                    if(res.application.is_lwd == true){
                                        $('#is_lwd').prop('checked', true);
                                    }else{
                                        $('#is_lwd').prop('checked', false);
                                    }
                                    $('#program_first_choice').val(res.application.program_first_choice);
                                    $('#program_second_choice').val(res.application.program_second_choice);
                                    $('#program_third_choice').val(res.application.program_third_choice);
                                    $('#firstQuarter').val(res.application.first_quarter_average);
                                    $('#secondQuarter').val(res.application.second_quarter_average);
                                    $('#thirdQuarter').val(res.application.third_quarter_average);
                                    $('#remarks').val(res.application.remarks);

                                }

                            })
                        })

                        $('.btn-view-transferee').click(function(){
                            let transferee_id = $(this).prop('id');
                            $.ajax({
                                url: 'editTransferee',
                                method: 'get',
                                dataType: 'json',
                                data: {'transferee_id': transferee_id},
                                success: function(res) {
                                    console.log(res.application);
                                    $('#transferee_id').val(res.transferee.transferee_id);
                                    $('#delete_transferee').val(res.transferee.transferee_id);
                                    $('#grade_level_t').val(res.transferee.grade_level);
                                    $('#last_school_year_t').val(res.transferee.last_school_year);
                                    $('#last_school_attended_t').val(res.transferee.last_school_attended);
                                    $('#last_school_address_t').val(res.transferee.last_school_address);
                                    if(res.transferee.is_lwd == true){
                                        $('#is_lwd_t').prop('checked', true);
                                    }else{
                                        $('#is_lwd_t').prop('checked', false);
                                    }
                                    $('#track_strand_t').val(res.transferee.program);
                                    $('#general_average_1st_t').val(res.transferee.general_average_1st);
                                    $('#general_average_2nd_t').val(res.transferee.general_average_2nd);
                                    $('#remarks_t').val(res.transferee.remarks);

                                }

                            })
                        })

                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            

            })
        }

        $('#btnExistingApplication').click(function(){
            loadExistingApplication();  
        })


        function getDocuments(){
            $('.div-form-content').load('pages/application/documents/applicants_documents.php', function(){
                $(this).css('opacity',0).stop().animate({"opacity": 1});//load page smoothly
                // $('.data-content').append('<button class="btn btn-primary">Add Files</button>');//show add files button even if there is no result in query

                let applicant_id = $('#applicant_id').val();
                $.ajax({
                    url: 'loadApplicantsDocument',
                    method: 'get',
                    dataType: 'json',
                    data: {'applicant_id': applicant_id},
                    beforeSend: function(){
                        $('.spiner-div').show();
                        $('.div-main').addClass('faded');
                    },
                    complete: function() {
                        $('.spiner-div').hide();
                        $('.div-main').removeClass('faded');
                    },
                    success: function(res) {
                        console.log(res);
                        let count = 0;
                        $('.data-content').append('<form id="deleteFileForm"></form>');
                        $.each(res.documents, function(key, val){
                            count++;
                            $('.data-content').append(
                                '<div class="col-md-3 mb-4" style="padding-bottom: 1rem; border-bottom: 1px solid gray;">'+
                                    '<div class="thumbnail-div" style="width: 100%; height: 100%;">'+
                                        '<a data-magnify="gallery" data-src="upload/applicants_files/'+val.random_filename+'" data-caption="Applicant Document" data-group="a" href="">'+
                                            '<img src="upload/applicants_files/'+val.random_filename+'" style="width: 100%; height: 50%; object-fit: fill">'+
                                        '</a>'+
                                        '<input type="text" disabled="true" value="'+val.filename+'" style=" width: 100%;"/>'+
                                        '<div class="row">'+
                                            '<div class="col-md-6">'+
                                                '<a class="btn btn-primary btn-sm form-control" style="width: 100%;" href="upload/applicants_files/'+val.random_filename+'" target="_blank" title="Open File"><i class="bi bi-folder2-open"></i></a>'+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                                '<button class="btn btn-danger btn-sm btn_delete_file form-control" type="submit" id="'+val.applicants_file_id+'" form="deleteFileForm" style=" width: 100%;" title="Delete File"><i class="bi bi-trash"></i></button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            );                
                        })
                        if(count <= 0){
                            $('.data-content').append('<div class="col-md-12"><center><p>No Documents Available</p></center></div>');
                        }

                        $('.btn_delete_file').click(function(){
                            // alert(file_id);
                            let file_id = $(this).prop('id');
                            $('#deleteFileForm').submit(function(event){
                                event.preventDefault();
                            
                                let confirm_del = confirm('are you sure you want to delete this file?');
                                if(confirm_del){
                                    $.ajax({
                                        url: 'delete_file',
                                        method: 'get',
                                        dataType: 'json',
                                        data: {'file_id': file_id},
                                        beforeSend: function() {
                                            $('.spiner-div').show();
                                            $('.div-main').addClass('faded');
                                        },
                                        complete: function() {
                                            $('.spiner-div').hide();
                                            getDocuments();//refresh the page
                                        },
                                        error: function(err) {
                                            console.log(err);
                                        },
                                        success: function(res) {
                                           
                                        }  
                                    })
                                }
                            })
                        })
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            })
        }

        $('#btn_document').click(function(){
            getDocuments();
        })


        $('#btn_edit_profile').click(function(){
            let applicant_id = $('#applicant_id').val();
            $.ajax({
                    url: 'edit_profile',
                    method: 'get',
                    dataType: 'json',
                    data: {'applicant_id': applicant_id},
                    beforeSend: function() {
                        $('.spiner-div').show();
                        $('.div-main').addClass('faded');
                    },
                    complete: function() {
                        $('.spiner-div').hide();
                        $('.div-main').removeClass('faded');
                    },
                    success: function(res) {
                        console.log(res);
                        $('#edit_profile_content').html(
                            '<form id="updateProfileForm"></form>'+
                            '<input type="hidden" name="applicant_id" value="'+res.profile.applicant_id+'" form="updateProfileForm">'+
                            '<div class="col-md-12 mb-4">'+
                                '<label for="lrn">LRN</label>'+
                                '<input type="text" class="form-control" name="lrn" value="'+res.profile.applicant_lrn+'" form="updateProfileForm">'+
                            '</div>'+
                            '<div class="col-md-4 mb-4">'+
                                '<label for="first_name">First Name</label>'+
                                '<input type="text" class="form-control" name="first_name" value="'+res.profile.firstname+'" form="updateProfileForm">'+
                            '</div>'+
                            '<div class="col-md-4 mb-4">'+
                                '<label for="middle_name">Middle Name</label>'+
                                '<input type="text" class="form-control" name="middle_name" value="'+res.profile.middle_name+'" form="updateProfileForm">'+
                            '</div>'+
                            '<div class="col-md-4 mb-4">'+
                                '<label for="last_name">Last Name</label>'+
                                '<input type="text" class="form-control" name="last_name" value="'+res.profile.last_name+'" form="updateProfileForm">'+
                            '</div>'+
                            
                            '<div class="col-md-6 mb-4">'+
                                '<label for="gender">Gender</label>'+
                                '<select class="form-control" name="gender" id="gender" form="updateProfileForm">'+
                                    '<option value="">--</option>'+
                                    '<option value="MALE">MALE</option>'+
                                    '<option value="FEMALE">FEMALE</option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="col-md-6 mb-4">'+
                                '<label for="birthday">Birthday</label>'+
                                '<input type="date" class="form-control" name="birthday" value="'+res.profile.birthdate+'" form="updateProfileForm">'+
                            '</div>'+
                            '<div class="col-md-4 mb-4">'+
                                '<label for="phone">Phone No.</label>'+
                                '<input type="text" class="form-control" name="phone" value="'+res.profile.phone+'" form="updateProfileForm">'+
                            '</div>'+
                            '<div class="col-md-8 mb-4">'+
                                '<label for="email">Email <h6>(cannot be edited, please contact the administrator.)</h6></label>'+
                                '<input type="text" class="form-control" readOnly="true" name="email" value="'+res.profile.email+'">'+
                            '</div>'+
                            '<div class="col-md-12 mb-2">'+
                            '<hr>'+
                                '<label for="">Address</i></label>'+
                            '</div>'+
                            '<div class="col-md-12 mb-4">'+
                                '<label for="cur_street">Current <h6>(cannot be edited, please contact the administrator.)</h6></label>'+
                                '<input type="text" class="form-control" readOnly="true" value="'+res.profile.cur_street+ ', '+res.profile.cur_subdivision+ ', '+res.profile.cur_barangay+', '+res.profile.cur_city+', '+res.profile.cur_province+'">'+
                            '</div>'+
                            '<div class="col-md-12 mb-4">'+
                                '<label for="cur_subdivision">Permanent Address <h6>(cannot be edited, please contact the administrator.)</h6></label>'+
                                '<input type="text" class="form-control" readOnly="true" value="'+res.profile.per_street+ ', '+res.profile.per_subdivision+ ', '+res.profile.per_barangay+', '+res.profile.per_city+', '+res.profile.per_province+'">'+
                            '</div>'+
                            '<div class="col-md-12" style="padding: 0 15% 5% 15%;">'+
                            '<hr>'+
                                '<button class="btn btn-primary" type="submit" style="width: 100%;" form="updateProfileForm">Update</button>'+
                            '</div>'
                        );

                        $("#gender option[value="+res.profile.gender+"]").attr("selected", "selected");

                        $('#updateProfileForm').submit(function(event){
                            event.preventDefault();

                            let formData = new FormData(this);

                            $.ajax({
                                url: 'update_profile',
                                method: 'post',
                                dataType: 'json',
                                data: formData,
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend: function() {
                                },
                                complete: function() {
                                    $('#modalEditProfile').modal('toggle');
                                    window.location.href = 'login_application';
                                },
                                success: function(res) {
                                    console.log(res);
                                }
                            })
                        })
                    }
            })
        })


        $('#transferee-tab').click(function(){
            $('#transferee').load('pages/transferees/transferee_form.php');
        })

  
    </script>