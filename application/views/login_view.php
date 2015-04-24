  <div class="container">
    <div class="login-form">
      <h1 class="text-center">Log in to Blitz</h1>
      <?php echo validation_errors('<p class="alert alert-danger">', '</p>'); ?>
      <div class="form-header">
        <em class="fa fa-user"></em>
      </div>
      <?php echo form_open('verifylogin', array('class' => 'form-signin')); ?>
        <label for="username">Username</label>
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
        <button class="btn btn-block bt-login" type="submit">Sign in</button>
      </form>
      <div class="form-footer">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-lock"></em>
             <a href="<?php echo site_url() . 'forgotpassword' ?>">Forgot password</a>          
          </div>
          
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-check"></em>
            <a href="<?php echo site_url() . 'register' ?>"> Sign Up </a>
          </div>
        </div>
      </div>
    </div>
  </div>
