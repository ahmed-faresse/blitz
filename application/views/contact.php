<div class="bg"> 
<div class="container contact">
    <h1 class="text-center">Contact us</h1>
    <br />

    <?php if (validation_errors() != '') { ?>
        <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Error !</strong><br/><br/><?php echo validation_errors();?>
            </div>
        </div>
    <?php } ?>

    <?php if ($success) { ?>
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>Success !</strong><br/><br/>Your message has been sent
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <?php echo form_open('verifycontact', array('class' => 'form-contact')); ?>

            <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input name="email" id="email" type="text" class="form-control" placeholder="Enter your email" autofocus value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="message">Message</label>
                <textarea name="message" id="message" class="form-control" placeholder="Enter your message" rows="10"><?php echo $message ?></textarea>
            </div>
            <button class="btn btn-block bt-login" type="submit">Send</button>
        </form>
    </div>
</div>
</div>