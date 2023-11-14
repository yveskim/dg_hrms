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
                <div class="col-md-12 mb-1"> <button class="btn btn-info full-size btn-shadow">Profile</button> </div>
                <div class="col-md-12 mb-1"> <button class="btn btn-info full-size btn-shadow">Existing
                        Application</button> </div>
                <div class="col-md-12 mb-1"> <button class="btn btn-info full-size btn-shadow">Documents</button> </div>
            </div>
        </div>
        <div class="col-md-8 div-form-content">
            <input style="width: 100%;" type="hidden" value="<?php echo $profile_pic_name['random_filename']; ?>" id="profile_pic_random_name"><!--reference pic name-->
            <br>
            <div class="row">
                <div class="col-md-8">
                    <h2>PROFILE</h2>
                </div>
                <div class="col-md-1" style="padding-top: 8%;">
                    <i type="button" class="bi-camera-fill" style="font-size: 3rem; opacity: .8;" id="upload-pic-btn" data-toggle="modal" data-target="#modal-upload-pic"></i>
                </div>
                <div class="col-md-3">
                    <img src=" 
                        <?php
                        if (empty($profile_pic_name['random_filename'])) {
                            echo 'upload/system_file/noimage.png';
                        } else {
                            echo 'upload/applicants_profile_image/' . $profile_pic_name['random_filename'];
                        }
                        ?>" id="profile_pic_src" alt="noimage" style="width: 8rem; height: 8rem; border: 2px solid gray; border-radius: .5rem;">
                </div>


            </div>
            <hr>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <button class="btn btn-primary full-size"><i class="bi-pencil-square"></i> Edit</button>
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
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalSelectApplication">
                        Select Application
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: left; box-shadow: 3px 3px 5px 1px gray; padding: 1rem; ">
                    <h5>Applicants Profile</h5>
                    <p>This is your accounts profile. You can choose your application in the Select Application button.
                        If you already processed an application, please wait for the verification of the admin.</p>
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


                        <div class="container h-100 py-2">
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">


                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="new-student" data-toggle="tab" href="#newStudent" role="tab" aria-controls="newStudent" aria-selected="false">New Student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="transferee-tab" data-toggle="tab" href="#transferee" role="tab" aria-controls="transferee" aria-selected="false">Transferee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border border-info border-bottom-0" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Balik-aral</a>
                                </li>
                            </ul>




                            <div class="tab-content h-75">

                                <!-- NEW STUDENT  -->

                                <div class="tab-pane border border-info" id="newStudent" role="tabpanel" aria-labelledby="new-student">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>NEW STUDENT APPLICATION FORM (Incoming grade 7 only.)</h6>
                                                    <p>Application Form for incoming grade 7 learners. This application
                                                        is subject for checking, validation, and ranking. Please select
                                                        the program you want to apply and click proceed.</p>
                                                </div>
                                                <div class="col-md-8 mb-4" style="border-left: 1px solid gray;">
                                                    <label for="" class="form-label">Select Program</label>
                                                    <select name="" id="chosen-program" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="spste">SPSTE</option>
                                                        <option value="stvep">STVEP</option>
                                                        <option value="spj">SPJ</option>
                                                        <option value="sse">SSE</option>
                                                        <option value="sps">SPS</option>
                                                        <option value="spa">SPA</option>
                                                        <option value="regular">Regular</option>
                                                        <option value="als">ALS</option>
                                                    </select>
                                                    <br>
                                                    <button class="btn btn-primary" style="width: 100%;" id="proceed-to-form-btn">PROCEED</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row application-form-div">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane border border-info" id="transferee" role="tabpanel" aria-labelledby="transferee-tab">Transferee tab content..</div>
                                <div class="tab-pane border border-info" id="messages" role="tabpanel" aria-labelledby="messages-tab">Message tab content...</div>
                                <div class="tab-pane border border-info" id="settings" role="tabpanel" aria-labelledby="settings-tab">Settings tab content...</div>
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
                            <h5>PLEASE READ!</h5>
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


    <script type="text/javascript">
        $(window).on('load', function() {
            $('.spiner-div').hide();
            $('.div-main').removeClass('faded');
        });

        $(document).ready(function() {
            $('#account_id').val($('#applicant_id').val());
            $('#input-trigger').keypress(function(e) {
                var key = e.which;
                if (key == 13) // the enter key code
                {
                    //$(this).click();
                    $('#btn-regular-form').prop('disabled', false);
                    $('#btn-regular-form').trigger('click');
                    // alert('The Form for Regular Application is officialy closed!.')
                    return false;
                } else {
                    alert('The Form for Regular Application is officialy closed!.')
                }
            });

        });


        $('#proceed-to-form-btn').click(function() {
            if ($('#chosen-program').val() === 'spste') {
                $('.application-form-div').load('pages/froms/spste_form.php').hide().fadeIn();
            }

            if ($('#chosen-program').val() === 'stvep') {
                $('.application-form-div').load('pages/froms/stvep_form.php').hide().fadeIn();
            }
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

                },
                complete: function() {
                    $('#modal-upload-pic').modal('toggle');
                    $('.modal-backdrop').remove();
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
    </script>