<?php $groups = $this->ion_auth->groups()->result();
?>
<div class="col-md-12">
    <div class="row">
        <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
            <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">First Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo(isset($current_user) ? $current_user->first_name : set_value('first_name'));?>" required=""/>
                    <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('last_name') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Last Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="last_name" placeholder="Last name" value="<?php echo (isset($current_user) ? $current_user->last_name: set_value('last_name'));?>" required=""/>
                    <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('email') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Email</label>
                <div class="col-lg-4">
                    <input class="form-control" type="email" name="email" placeholder="<?php echo (isset($current_user) ? $current_user->email: 'Email');?>" value="<?php echo set_value('email');?>" <?php echo (isset($current_user) ? '': 'required');?>/>
                    <?php echo form_error('email', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <!--<div class="form-group <?php /*echo(form_error('username') != '' ? 'has-error' : '');*/?>">
                <label class="control-label col-lg-2">Username</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="username" placeholder="Last name" value="<?php /*echo (isset($current_user) ? $current_user->username: '');*/?>" required=""/>
                    <?php /*echo form_error('username', '<div class="">', '</div>'); */?>
                </div>
            </div>-->

            <div class="form-group <?php echo(form_error('phone') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Phone</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="<?php echo (isset($current_user) ? $current_user->phone : set_value('phone'));?>"/>
                    <?php echo form_error('phone', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('group') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Group</label>
                <div class="col-lg-4">
                    <select class="form-control" name="group">
                        <option value="" selected disabled>Select</option>
                        <?php
                        if ($groups != FALSE) {
                            foreach ($groups as $group) {
                                ?>
                                <option
                                    value="<?php echo $group->id;?>"
                                    <?php echo (!empty($current_user->groups) ? ($group->id == $current_user->groups[0]->id ? 'selected' : '') : '')?> >
                                    <?php echo $group->name;?>
                                </option>
                            <?php
                            }
                        }
                        ?>

                    </select>
                    <?php echo form_error('username', '<div class="">', '</div>'); ?>
                </div>
            </div>
            <?php
            if (!isset($current_user)) {
                ?>
                <div class="form-group">
                    <label class="control-label col-lg-2">Password</label>

                    <div class="col-lg-4">
                        <div class="help-block">
                            Default password is "password"
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($current_user)) {
                ?>
                <div class="form-group">
                    <label class="control-label col-lg-2">Reset Password</label>

                    <div class="col-lg-4">
                        <input type="checkbox" name="reset_password" value="1"/>
                        <div class="help-block">If Tick Password changed to "password"</div>
                    </div>
                </div>
            <?php
            }
            ?>

            <!--<div class="form-group <?php /*echo(form_error('password') != '' ? 'has-error' : '');*/?>">
                <label class="control-label col-lg-2">Password</label>
                <div class="col-lg-4">
                    <input class="form-control" type="password" name="password" placeholder="Last name" value="<?php /*echo (isset($current_user) ? $current_user->password: '');*/?>"/>
                    <?php /*echo form_error('password', '<div class="">', '</div>'); */?>
                </div>
            </div>

            <div class="form-group <?php /*echo(form_error('confirm_password') != '' ? 'has-error' : '');*/?>">
                <label class="control-label col-lg-2">Confirm Password</label>
                <div class="col-lg-4">
                    <input class="form-control" type="password" name="confirm_password" placeholder="Last name" value="<?php /*echo (isset($current_user) ? $current_user->confirm_password: '');*/?>"/>
                    <?php /*echo form_error('confirm_password', '<div class="">', '</div>'); */?>
                </div>
            </div>-->

            <div class="form-group">
                <div class="col-lg-8 text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a class="btn btn-danger" href="<?php echo site_url('users');?>">Reset</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($users) and $users != FALSE) {
                $i = 1;
                foreach ($users as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->first_name; ?></td>
                        <td><?php echo $value->last_name; ?></td>
                        <td><?php echo $value->username; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td>
                            <?php foreach ($value->groups as $group) { ?>
                                <a href=""><?php echo $group->name;?></a>,
                            <?php
                            }
                        ?>
                        </td>
                        <td>
                            <div  class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-info" href="<?php echo site_url('users/edit/' . $value->id);?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo site_url('users/delete/' . $value->id);?>">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</div>