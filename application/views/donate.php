<div class="container donate">
	<h1 class="text-center">Donate</h1>

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
        <?php echo form_open('verifyDonate', array('class' => 'form-contact')); ?>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input name="amount" id="amount" type="text" class="form-control" placeholder="Enter the amount you want to donate" autofocus>
            </div>
            <div class="form-group radio-card">
           		<div class="col-md-3">
	                <label for="Visa">
	                <input name="cardType" id="Visa" type="radio" value="Visa"/>
	                <?php echo img("visa.jpg", "", "visa");?>
	                </label>
                </div>
                <div class="col-md-3">
	                <label for="Visa Electron">
	                <input name="cardType" id="Visa Electron" type="radio" value="Visa electron"/>
	                <?php echo img("visaelectron.jpg", "", "visa electron");?>
	                </label>
                </div>
                <div class="col-md-3">
	                <label for="MasterCard">
	                <input name="cardType" id="MasterCard" type="radio" value="Mastercard" />
	                <?php echo img("mastercard.jpg", "", "mastercard");?>
	                </label>
                </div>
                <div class="col-md-3">
	                <label for="Maestro">
	                <input name="cardType" id="Maestro" type="radio" value="Maestro"/>
	                <?php echo img("maestro.jpg", "", "maestro");?>
	                </label>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name on the card</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="" autofocus>
            </div>
            <div class="form-group">
                <label for="number">Card Number</label>
                <input name="number" id="number" type="text" class="form-control" placeholder="" autofocus>
            </div>
            <div class="form-group">
                <label for="crypto">Card Cryptogram</label>
                <input name="crypto" id="crypto" type="text" class="form-control" placeholder="" autofocus>
            </div>
            <div class="form-group">
                <label for="date">Expiration date (MM/YY)</label>
                <input name="date" id="date" type="text" class="form-control" placeholder="" autofocus>
            </div>
            <button class="btn btn-block" type="submit">Send</button>
        </form>
    </div>
</div>