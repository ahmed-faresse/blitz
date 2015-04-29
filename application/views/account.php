<div class="container account">
    <h1 class="text-center">My account</h1>
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
                <strong>Success !</strong><br/><br/>Your password has been changed
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="panel">
            <div class="panel-heading panel-heading-account">
                <h2 class="panel-title text-center"><strong><?php echo $userInformation->username ?></strong></h2>
            </div>
            <div class="panel-body-account">
                <p>Your email address is <strong><?php echo $userInformation->email ?></strong></p>
            </div>
        </div>

        <button class="btn btn-block btn-login" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword">
            Change my password
        </button>

        <div class="collapse" id="collapsePassword">
            <div class="well">
                <?php echo form_open('changepassword', array('class' => 'form-contact')); ?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" id="password" type="password" class="form-control " placeholder="Enter your password" autofocus>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="newpassword">New password</label>
                        <input name="newpassword" id="newpassword" type="password" class="form-control " placeholder="Enter your new password">
                    </div>
                    <div class="form-group">
                        <label for="confirmnewpassword">Confirm your new password</label>
                        <input name="confirmnewpassword" id="confirmnewpassword" type="password" class="form-control " placeholder="Confirm your new password">
                    </div>
                    <button class="btn btn-block btn-save" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

    <br />
    <br />
    <?php if ($transactions != false) { ?>
        <div class="row">
            <div class="panel">
                <div class="panel-heading panel-heading-account">
                    <h2 class="panel-title text-center">Historic of my transactions</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Date of the transaction</th>
                            <th>Amount</th>
                        </tr>
                        <?php foreach($transactions as $transaction) { ?>
                            <tr>
                                <td>
                                    <?php echo $transaction->date ?>
                                </td>
                                <td>
                                    <?php echo $transaction->amount ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    <?php }
    else { ?>
        <p>No transactions.</p>
    <?php } ?>

</div>