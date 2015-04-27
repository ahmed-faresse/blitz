  <div class="container">
    <div class="login-form">
      <h1 class="text-center">Forgot Password?</h1>
      <?php echo validation_errors('<p class="alert alert-danger">', '</p>'); ?>
      <div class="form-header">
        <em class="fa fa-user"></em>
      </div>
       <?php echo form_open('verifyforgotpassword', array('class' => 'form-register')); ?>
        <div>
          <label for="email">Email</label>
          <input id="email" name="email" type="email" class="form-control" placeholder="Email address">  
          <span class="help-block"></span>
        </div>
        <button class="btn btn-block bt-login" type="submit">Reset Password</button>
      </form>
      <div class="form-footer">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-lock"></em>
            <a href="<?php echo site_url() . 'login' ?>"> Sign In </a>
          
          </div>
          
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-check"></em>
            <a href="<?php echo site_url() . 'register' ?>"> Sign Up </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /container -->