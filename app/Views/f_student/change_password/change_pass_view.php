  <?= csrf_field(); ?>


  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>


    <div class="login_wrapper">
      <div class="animate form login_form">
        <div class="validation-div" style="color:red;">
            <?= \Config\Services::validation()->listErrors() ?>
        </div>
        <section class="login_content">
          <form class="" action="updateStudentPassword" method="post">
            <input type="hidden" name="user_id" value="<?= $user_id; ?>">
            <h1>Change Password</h1>
            <div>
              <input type="password" class="form-control" placeholder="Enter New Password" name="new_password"  />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_new_password"/>
            </div>

            <div>
              <input class="btn btn-info" type="submit" name="submit" value="Proceed" style="width: 17em;">
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <!-- <p class="change_link">Don't want to continue?
                <a href="/" class="to_register"> Back to Home Page </a>
              </p> -->

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-lock"></i> New Account Verification </h1>
                <p>New accounts needs to change their password for better security, please choose a password that is not easy to guess.</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
