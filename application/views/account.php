<div class="container account">
    <div class="account-head">
        <em class="fa fa-user"></em>
        <h1 class="text-center">My account</h1>
    </div>

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

    <div class="row headings">
            <h3 class="title">Username: <strong><?php echo $userInformation->username ?></strong></h3>
            <h3 class="title">Email address: <strong><?php echo $userInformation->email ?></strong></h3>
    </div>

    <div class="row">
        <div class="panel">
        <div class="panel-heading panel-heading-account">
                <h2>Change my password</h2>
        </div>

        <div class="panel-body" hidden>
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
    </div>

    <div class="row">
        <div class="panel">
            <div class="panel-heading panel-heading-account">
                <h2>Historic of my transactions</h2>
            </div>
            <div class="panel-body" hidden>
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

    <div class="row">
        <div class="panel">
            <div class="panel-heading panel-heading-account">
                <h2>Events joined</h2>
            </div>
            <div class="panel-body" hidden>
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
                                    <a href="<?php echo base_url() ?>account/remove_player/<?php echo $eventRegistrations[$i]->id ?>" class="btn btn-danger" role="button"><em class="fa fa-minus-circle"></em> Unregister</a>
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
                <h2>Events created</h2>
            </div>
            <div class="panel-body" hidden>
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
                                    <a href="<?php echo base_url() ?>account/remove_event/<?php echo $event->id ?>" class="btn btn-danger" role="button"><em class="fa fa-minus-circle"></em> Cancel event</a>
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