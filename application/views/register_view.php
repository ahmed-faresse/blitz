  <div class="container">
    <div class="login-form">
      
      <h1 class="text-center">Blitz Registration</h1>
      <div class="form-header">
        <em class="fa fa-user"></em>
      </div>
      <?php echo validation_errors('<p class="alert alert-danger">', '</p>'); ?>
      <?php echo form_open('verifyregister', array('class' => 'form-register')); ?>
      <br/>

        <div>
        <label for="username">Username</label>
          <input name="username" id="username" type="text" class="form-control" placeholder="Username"> 
          <span class="help-block"></span>
        </div>
        <div>
          <label for="email">Email</label>
          <input name="email" id="email" type="email" class="form-control" placeholder="Email address" > 
          <span class="help-block"></span>
        </div>
        <div>
          <label for="password">Password</label>
          <input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
          <span class="help-block"></span>
        </div>
        <button class="btn btn-block bt-login" type="submit">Sign Up</button>
      </form>
      <div class="form-footer">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-lock"></em>
            <a href="<?php echo site_url() . 'forgotpassword' ?>"> Forgot password? </a>
          
          </div>
          
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-check"></em>
            <a href="<?php echo site_url() . 'login' ?>"> Sign In </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /container -->