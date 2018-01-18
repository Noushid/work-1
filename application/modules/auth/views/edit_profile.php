<?php //var_dump($user);exit?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>My Profile</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>profile</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Profile</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row"><div class="tabs-container">
                            <ul class="nav nav-tabs" id="my-profile-tab">
                                <li class="<?php echo(!isset($active_tab) ? 'active' :  (isset($active_tab) && $active_tab == 'tab-profile') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-profile"><i class="fa fa-user"></i> Profile</a></li>
                                <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-preference') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-preference"><i class="fa fa-cogs"></i> Preference</a></li>
                                <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-change-password') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-change-password"><i class="fa fa-key"></i> Change Password</a></li>
                                <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-electronic-signature') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-electronic-signature"><i class="fa fa-key"></i> Electronic Signature</a></li>
                                <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-credential') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-credential"><i class="fa fa-sitemap"></i> My Credential</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-profile" class="tab-pane <?php echo(!isset($active_tab) ? 'active' : (isset($active_tab) && $active_tab == 'tab-profile') ? 'active' : '');?>">
                                    <div class="panel-body">
                                        <form action="<?php echo current_url()?>" class="form-horizontal" method="post">
                                            <input type="hidden" name="tab" value="myaccount"/>
                                            <div class="form-group">
                                                <h4><strong>My Account</strong></h4>
                                            </div>
                                            <div class="hr-line-dashed"></div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">User Email Account</label>
                                                <div class="col-lg-5 <?php echo(form_error('user_email') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="user_email" id="user_email" placeholder="Email" value="<?php echo(isset($user) ? $user->user_email : set_value('user_email'));?>" disabled/>
                                                    <?php echo form_error('user_email', '<div class="help-block">', '</div>'); ?>
                                                </div>

                                                <div class="i-checks" id="change-user-email-check">
                                                    <label class="">
                                                        <div class="icheckbox_square-green" style="position: relative;">
                                                            <input value="" style="position: absolute; opacity: 0;" type="checkbox">
                                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                                        </div>
                                                        <i></i> Change it!  <span class="text-info"> <small>(Use this field as your Login User Id)</small></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 required">Nick Name Login</label>
                                                <div class="col-lg-5 <?php echo(form_error('user_nick') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="user_nick" placeholder="Your Last Name" value="<?php echo(isset($user) ? $user->user_nick : set_value('user_nick'));?>"/>
                                                    <?php echo form_error('user_nick', '<div class="">', '</div>'); ?>
                                                </div>
                                                <span class="help-inline col-md-3">
                                                    <span class="lbl text-info"> <small>(Use this field as an alternate Login User Id)</small> </span>
                                                </span>
                                            </div>
                                            <div class="hr-line-dashed"></div>

                                            <div class="form-group">
                                                <h4><strong> <i class="fa fa-exclamation-circle"></i>  Personal Information</strong></h4>
                                            </div>
                                            <div class="hr-line-dashed"></div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2 required">User First Name</label>
                                                <div class="col-lg-4 <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="first_name" placeholder="Your First Name" value="<?php echo(isset($user) ? $user->first_name : set_value('first_name'));?>"/>
                                                    <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                                                </div>

                                                <label class="control-label col-md-2 required">User Last Name</label>
                                                <div class="col-lg-4 <?php echo(form_error('last_name') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="last_name" placeholder="Your Last Name" value="<?php echo(isset($user) ? $user->last_name : set_value('last_name'));?>"/>
                                                    <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Address</label>
                                                <div class="col-lg-4  <?php echo(form_error('address') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo(isset($user) ? $user->address : set_value('address'));?>"/>
                                                    <?php echo form_error('address', '<div class="">', '</div>'); ?>
                                                </div>

                                                <label class="control-label col-md-2">City</label>
                                                <div class="col-lg-4  <?php echo(form_error('city') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="city" placeholder="City" value="<?php echo(isset($user) ? $user->city : set_value('city'));?>"/>
                                                    <?php echo form_error('city', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">State</label>
                                                <div class="col-lg-4  <?php echo(form_error('state') != '' ? 'has-error' : '');?>">
                                                    <select name="state_id" class="form-control">
                                                        <option value="" selected disabled>Select</option>
                                                        <?php
                                                        if (isset($state) and $state != NULL) {
                                                            foreach ($state as $st) {
                                                                ?>
                                                                <option
                                                                    value="<?php echo $st->state_id; ?>" <?php echo set_select('state_id', $st->state_id); echo((isset($user) && $user->user_id == $st->state_id) ? 'selected' : '');?>><?php echo $st->state_name_long; ?></option>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php echo form_error('state', '<div class="">', '</div>'); ?>
                                                </div>

                                                <label class="control-label col-md-2">Zip code</label>
                                                <div class="col-lg-4  <?php echo(form_error('zip_code') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="zip_code" placeholder="Zip Code" value="<?php echo(isset($user) ? $user->zip_code : set_value('zip_code'));?>"/>
                                                    <?php echo form_error('zip_code', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group" id="data_phone">
                                                <label class="control-label col-md-2">Home Phone</label>
                                                <div class="col-lg-4 <?php echo(form_error('phone_home') != '' ? 'has-error' : '');?>" id="data_home_phone">
                                                    <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Contact Phone Number" name="phone_home" value="<?php echo(isset($user) ? $user->phone_home : set_value('phone_home'));?>" id="phone_home" />
                                                    <?php echo form_error('phone_home', '<div class="">', '</div>'); ?>
                                                </div>

                                                <label class="control-label col-md-2">Cell Phone</label>
                                                <div class="col-lg-4 <?php echo(form_error('phone_cell') != '' ? 'has-error' : '');?>" id="data_phone_cell">
                                                    <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Cell Phone" name="phone_cell" value="<?php echo (isset($user) ? $user->phone_cell: set_value('phone_cell'));?>" id="phone_cell" />
                                                    <?php echo form_error('phone_cell', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <?php echo form_hidden($csrf); ?>

                                            <div class="form-group">
                                                <div class="col-lg-8 text-center">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tab-preference" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-preference') ? 'active' : '');?>">
                                    <div class="panel-body">
                                        <form action="<?php echo current_url()?>" class="form-horizontal" method="post">
                                            <input type="hidden" name="tab" value="preference"/>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Start on page</label>
                                                <div class="col-lg-4  <?php echo(form_error('state') != '' ? 'has-error' : '');?>">
                                                    <?php echo form_error('state', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <?php echo form_hidden($csrf); ?>

                                            <div class="form-group">
                                                <div class="col-lg-8 text-center">
<!--                                                    <button class="btn btn-success">Submit</button>-->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tab-change-password" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-change-password') ? 'active' : '');?>">
                                    <div class="panel-body">
                                        <form action="<?php echo current_url()?>" class="form-horizontal" method="post">
                                            <input type="hidden" name="tab" value="change_password"/>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Password</label>
                                                <div class="col-lg-5">
                                                    <input class="form-control" type="password" name="password" placeholder="New password here" pattern="^.{<?php echo $min_length . ',' . $max_length;?>}.*$" />
                                                    Must be <?php echo $min_length . '-' . $max_length;?> characters long.
                                                    <?php echo form_error('password', '<div class="">', '</div>'); ?>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Confirm Password</label>
                                                <div class="col-lg-5">
                                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm New password here" pattern="^.{<?php echo $min_length . ',' . $max_length;?>}.*$"/>
                                                    <?php echo form_error('confirm_password', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <?php echo form_hidden($csrf); ?>

                                            <div class="form-group">
                                                <div class="col-lg-8 text-center">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tab-electronic-signature" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-electronic-signature') ? 'active' : '');?>">
                                    <div class="panel-body">
                                        <form action="<?php echo current_url()?>" class="form-horizontal" method="post">
                                            <input type="hidden" name="tab" value="electronic_signature"/>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 required">New Electronic Signature</label>
                                                <div class="col-lg-5 <?php echo(form_error('electronic_signature') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="electronic_signature" placeholder="Electronic password" value=""/>
                                                    <?php echo form_error('electronic_signature', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 required">Confirm New Electronic Signature</label>
                                                <div class="col-lg-5 <?php echo(form_error('confirm_electronic_signature') != '' ? 'has-error' : '');?>">
                                                    <input class="form-control" type="text" name="confirm_electronic_signature" placeholder="Confirm Electronic Signature" value=""/>
                                                    <?php echo form_error('confirm_electronic_signature', '<div class="">', '</div>'); ?>
                                                </div>

                                            </div>
                                            <?php echo form_hidden($csrf); ?>

                                            <div class="form-group">
                                                <div class="col-lg-8 text-center">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tab-credential" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-credential') ? 'active' : '');?>">
                                    <div class="panel-body">
                                        <div class="table-responsive">

                                            <table class="table table-striped table-bordered table-hover table-responsive dataTables-credential">
                                                <thead>
                                                <tr>
                                                    <th>Credential Type</th>
                                                    <th>Credential id</th>
                                                    <th>Expiration Date</th>
                                                    <th>Days left</th>
                                                    <th>Attachment</th>
                                                    <th>Notes</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (isset($credentials) and $credentials != FALSE) {
                                                    $i = 1;
                                                    foreach ($credentials as $credential) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $credential->tab_086_credential_type; ?></td>
                                                            <td><?php echo $credential->credential_id; ?></td>
                                                            <td><?php echo $credential->expiration_date; ?></td>
                                                            <td><?php echo $credential->alert_days; ?></td>
                                                            <td><?php echo(isset($credential->attachment) ? '<a href="' . site_url().'uploads/credential/'.$credential->attachment->attachment . '" target="_blank">View attachments</a>' : '');?></td>
                                                            <td><?php echo $credential->notes; ?></td>
                                                            <td class="center">
                                                                <div  class="btn-group btn-group-xs" role="group">
                                                                    <a class="btn btn-info" href="<?php echo site_url('my-profile/edit-credential/' . $credential->user_credential_id);?>">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        /********Data table for profile credential**/
        $('.dataTables-credential').DataTable({
            "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
            "pageLength": 300,
            responsive: true,
            dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtip',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'SubMenu'},
                {extend: 'pdf', title: 'SubMenu'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ],
            "fnInitComplete": function (oSettings, json) {
                $('#addBtn').append('<div class="col-md-4"><a class="btn btn-primary" href="<?php echo current_url().'/add-credential';?>">Add Credential</a></div>');
            }
        });


    });

</script>
