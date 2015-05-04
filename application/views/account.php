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
                <?php echo form_open('account', array('class' => 'form-contact')); ?>
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
    <div class="row">
        <div class="panel">
            <div class="panel-heading panel-heading-account">
                <h2 class="panel-title text-center">Historic of my transactions</h2>
            </div>
            <div class="panel-body">
                <?php if ($transactions != false) { ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Transaction date</th>
                            <th>Transaction amount</th>
                            <th>Event name</th>
                            <th>Event date</th>
                            <th>Event description</th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach($transactions as $transaction) { ?>
                            <tr>
                                <td>
                                    <?php echo $transaction->date ?>
                                </td>
                                <td>
                                    <?php echo $transaction->amount ?>
                                </td>
                                <td>
                                    <?php echo $eventTransactions[$i]->name ?>
                                </td>
                                <td>
                                    <?php echo $eventTransactions[$i]->date ?>
                                </td>
                                <td>
                                    <?php echo $eventTransactions[$i]->short_description ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        } ?>
                    </table>
                <?php }
                else { ?>
                    <p>You don't have transactions.</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <br />
    <br />

    <div class="row">
        <div class="panel">
            <div class="panel-heading panel-heading-account">
                <h2 class="panel-title text-center">Events joined</h2>
            </div>
            <div class="panel-body">
                <?php if ($registrations != false) { ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Registration date</th>
                            <th>Event name</th>
                            <th>Event date</th>
                            <th>Event description</th>
                            <th></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach($registrations as $registration) { ?>
                            <tr>
                                <td>
                                    <?php echo $registration->date ?>
                                </td>
                                <td>
                                    <?php echo $eventRegistrations[$i]->name ?>
                                </td>
                                <td>
                                    <?php echo $eventRegistrations[$i]->date ?>
                                </td>
                                <td>
                                    <?php echo $eventRegistrations[$i]->short_description ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() ?>account/remove_player/<?php echo $eventRegistrations[$i]->id ?>" class="btn btn-danger" role="button"><i class="fa fa-minus-circle"></i> Unregister</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        } ?>
                    </table>
                <?php }
                else { ?>
                    <p>You are not register to any event.</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel">
            <div class="panel-heading panel-heading-account">
                <h2 class="panel-title text-center">Events created</h2>
            </div>
            <div class="panel-body">
                <?php if ($authorEvent != false) { ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Event name</th>
                            <th>Event date</th>
                            <th>Event description</th>
                            <th>Current people registered</th>
                            <th></th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach($authorEvent as $event) { ?>
                            <tr>
                                <td>
                                    <?php echo $event->name ?>
                                </td>
                                <td>
                                    <?php echo $event->date ?>
                                </td>
                                <td>
                                    <?php echo $event->short_description ?>
                                </td>
                                <td>
                                    <?php echo $event->current_people ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() ?>account/remove_event/<?php echo $event->id ?>" class="btn btn-danger" role="button"><i class="fa fa-minus-circle"></i> Cancel event</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        } ?>
                    </table>
                <?php }
                else { ?>
                    <p>You are not register to any event.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>