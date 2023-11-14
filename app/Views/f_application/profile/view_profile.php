
<style media="screen">
  .content{
    margin-top: 5%;

  }

  .profile_right{
    padding-left: 2em;

  }

  .profile_left{
    border-right: 2px solid lightgray;
  }

</style>

<div class="content">

  <!-- page content -->
  <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>User Profile</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                </div>
                <h3><?= $admission['stud_firstname']." ". $admission['stud_lname'];?></h3>

                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?= $admission['per_stud_city'].", ". $admission['per_stud_province'];?></li>

                  <li>
                    <i class="fa fa-envelope user-profile-icon"></i> &nbsp;&nbsp;<?= $admission['stud_email'];?>
                  </li>

                </ul>

                <button type="button" class="btn btn-success bnt-edit-info" style="color: white"><i class="fa fa-edit m-right-xs"></i>Edit Profile</button>


                <br />
                <hr>

                <!-- start skills -->
                <h2>User Account</h2>
                <ul class="list-unstyled user_data">

                  <?php foreach ($account as $acc): ?>
                    <li>
                      <p>User Id: &nbsp;&nbsp;<?= $acc['adm_user_id'] ?></p>
                      <p>Username: &nbsp;&nbsp;<?= $acc['adm_username'] ?></p>
                      <p>Password: &nbsp;&nbsp;<?= $acc['adm_user_password'] ?></p>
                      <p>Date Created: &nbsp;&nbsp;<?= $acc['adm_date_created'] ?></p>
                    </li>

                  <?php endforeach; ?>
                </ul>
                <!-- end of skills -->
                  <button class="btn btn-success edit-account" style="color: white"><i class="fa fa-edit m-right-xs"></i>Edit Account</button>
              </div>


              <div class="col-md-12 col-sm-3  profile_right profile-content">


              </div>


            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- /page content -->

</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('.edit-account').click(function(){
      alert('This feature is not yet allowed to your account.')
    });


    var admId = "<?= $admission['admission_id']?>";
    var fname = "<?= $admission['stud_firstname']?>";
    var mname = "<?= $admission['stud_mname']?>";
    var lname = "<?= $admission['stud_lname']?>";
    var bday = "<?= $admission['stud_birthdate']?>";
    var gender = "<?= $admission['stud_gender']?>";
    var phone = "<?= $admission['stud_phone']?>";
    var per_street = "<?= $admission['per_stud_street']?>";
    var per_subdivision = "<?= $admission['per_stud_subdivision']?>";
    var per_barangay = "<?= $admission['per_stud_barangay']?>";
    var per_city = "<?= $admission['per_stud_city']?>";
    var per_province = "<?= $admission['per_stud_province']?>";
    var cur_street = "<?= $admission['cur_stud_street']?>";
    var cur_subdivision = "<?= $admission['cur_stud_subdivision']?>";
    var cur_barangay = "<?= $admission['cur_stud_barangay']?>";
    var cur_city = "<?= $admission['cur_stud_city']?>";
    var cur_province = "<?= $admission['cur_stud_province']?>";
    $('.bnt-edit-info').click(function(){
      $('.profile-content').load('pages/reg_profile/info_page.php', function(){
        $('#admId').val(admId);
        $('#firstname').val(fname);
        $('#middlename').val(mname);
        $('#lastname').val(lname);
        $('#birthdate').val(bday);
        $('#gender').val(gender);
        $('#phoneNumber').val(phone);
        var  per_province_selected = '<option value="'+ per_province +'">'+ per_province +'</option>';
        $('#per_province').html(per_province_selected);
      //  $('#per_province').val(per_province);

        var  per_city_selected = '<option value="'+ per_city +'">'+ per_city +'</option>';
        $('#per_city').html(per_city_selected);
        //$('#per_city').val(per_city);
        $('#per_barangay').val(per_barangay);
        $('#per_subdivision').val(per_subdivision);
        $('#per_street').val(per_street);

        var  cur_province_selected = '<option value="'+ cur_province +'">'+ cur_province +'</option>';
        $('#cur_province').html(cur_province_selected);

      //  $('#cur_province').val(cur_province);

        var  cur_city_selected = '<option value="'+ cur_city +'">'+ cur_city +'</option>';
        $('#cur_city').html(cur_city_selected);

        //$('#cur_city').val(cur_city);
        $('#cur_barangay').val(cur_barangay);
        $('#cur_subdivision').val(cur_subdivision);
        $('#cur_street').val(cur_street);
      });

      $('.profile_left').hide();

    });
  });
</script>
