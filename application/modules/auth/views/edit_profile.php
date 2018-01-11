<?php //var_dump($user);exit?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Agency</h2>
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
                    <div class="row">
                        <form action="<?php echo current_url()?>" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-2 required">First Name</label>
                                <div class="col-lg-4 <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="first_name" placeholder="Your First Name" value="<?php echo(isset($user) ? $user->first_name : set_value('first_name'));?>"/>
                                    <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                                </div>

                                <label class="control-label col-md-2">last Name</label>
                                <div class="col-lg-4 <?php echo(form_error('last_name') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="last_name" placeholder="Your Last Name" value="<?php echo(isset($user) ? $user->last_name : set_value('last_name'));?>"/>
                                    <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Nick Name</label>
                                <div class="col-lg-4  <?php echo(form_error('user_nick') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="user_nick" placeholder="Your Last Name" value="<?php echo(isset($user) ? $user->user_nick : set_value('user_nick'));?>"/>
                                    <?php echo form_error('user_nick', '<div class="">', '</div>'); ?>
                                </div>

                                <label class="control-label col-md-2 required">Email</label>
                                <div class="col-lg-4  <?php echo(form_error('user_email') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="email" name="user_email" placeholder="example@example.com" value="<?php echo(isset($user) ? $user->user_email : set_value('user_email'));?>"/>
                                    <?php echo form_error('user_email', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 required">Phone</label>
                                <div class="col-lg-4  <?php echo(form_error('phone_home') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="phone_home" placeholder="Your phone Number" value="<?php echo(isset($user) ? $user->phone_home : set_value('phone_home'));?>"/>
                                    <?php echo form_error('phone_home', '<div class="">', '</div>'); ?>
                                </div>

                                <label class="control-label col-md-2">Electronic Signature</label>
                                <div class="col-lg-4 <?php echo(form_error('electronic_signature') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="electronic_signature" placeholder="Electronic signature" value="<?php echo(isset($user) ? $user->electronic_signature : set_value('electronic_signature'));?>"/>
                                    <?php echo form_error('electronic_signature', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">City</label>
                                <div class="col-lg-4 <?php echo(form_error('city') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="city" placeholder="City" value="<?php echo(isset($user) ? $user->city : set_value('city'));?>"/>
                                    <?php echo form_error('city', '<div class="">', '</div>'); ?>
                                </div>

                                <label class="control-label col-md-2">Address</label>
                                <div class="col-lg-4 <?php echo(form_error('address') != '' ? 'has-error' : '');?>">
                                    <textarea
                                        class="form-control" name="address"><?php echo(isset($user) ? $user->address : set_value('address'));?> </textarea>
                                    <?php echo form_error('address', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Password (If Change)</label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="password" name="password" placeholder="******" pattern="^.{<?php echo $min_length . ',' . $max_length;?>}.*$" />
                                    Must be <?php echo $min_length . '-' . $max_length;?> characters long.
                                    <?php echo form_error('password', '<div class="">', '</div>'); ?>
                                </div>

                                <label class="control-label col-md-2">Confirm Password</label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="password" name="confirm_password" placeholder="******" pattern="^.{<?php echo $min_length . ',' . $max_length;?>}.*$"/>
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

            </div>
        </div>
    </div>
</div>
