<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Welcome to BLitz</title>
 </head>
 <body>
   <h1>Register Blitz</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifyregister'); ?>
    <label for="email">Email:</label>
     <input type="text" size="20" id="email" name="email"/>
     <br/>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Register"/>
   </form>
 </body>
</html>