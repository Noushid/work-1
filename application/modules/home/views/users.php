<?php $groups = $this->ion_auth->groups()->result();
if (isset($modal_opened) and $modal_opened == true) {
    ?>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#myModal4').modal('show');
        });
    </script>
<?php
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>User List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>Users</strong>
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
                    <h5>List All Users</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <?php echo(isset($current_user) ? '<h4 class="modal-title">Edit User</h4>' : '<h4 class="modal-title">Create User</h4>');?>
                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">First Name</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo(isset($current_user) ? $current_user->first_name : set_value('first_name'));?>" required=""/>
                                                <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('last_name') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Last Name</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="last_name" placeholder="Last name" value="<?php echo (isset($current_user) ? $current_user->last_name: set_value('last_name'));?>" required=""/>
                                                <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('email') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="email" name="email" placeholder="<?php echo (isset($current_user) ? $current_user->user_email: 'Email');?>" value="<?php echo set_value('email');?>" <?php echo (isset($current_user) ? '': 'required');?>/>
                                                <?php echo form_error('email', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('phone') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Phone</label>
                                            <div class="col-lg-8">
<!--                                                <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="--><?php //echo (isset($current_user) ? $current_user->phone_home : set_value('phone'));?><!--"/>-->
                                                <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Phone Number" name="phone" value="<?php echo (isset($current_user) ? $current_user->phone_home : set_value('phone'));?>"/>
                                                <span class="help-block">(999) 999-9999</span>
                                                <?php echo form_error('phone', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('group') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Group</label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="group">
                                                    <option value="" selected disabled>Select</option>
                                                    <?php
                                                    if ($groups != FALSE) {
                                                        foreach ($groups as $group) {
                                                            ?>
                                                            <option
                                                                value="<?php echo $group->id;?>"
                                                                <?php echo(!empty($current_user->groups) ? ($group->id == $current_user->groups[0]->id ? 'selected' : '') : '');
                                                                echo set_select('group', $group->id);?>>
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

                                                <div class="col-lg-8">
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

                                                <div class="col-lg-8">
                                                    <input type="checkbox" name="reset_password" value="1"/>
                                                    <div class="help-block">Password changed to "password"</div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('users')?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-users ">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
<!--                                <th>Username</th>-->
                                <th>Email</th>
<!--                                <th>Groups</th>-->
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($users) and $users != FALSE) {
                                foreach ($users as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->user_id; ?></td>
                                        <td><?php echo $value->first_name; ?></td>
                                        <td><?php echo $value->last_name; ?></td>
                                        <td><?php echo $value->user_email; ?></td>
<!--                                        <td>-->
<!--                                            --><?php //foreach ($value->groups as $group) { ?>
<!--                                                <a href="">--><?php //echo $group->name;?><!--</a>,-->
<!--                                            --><?php
//                                            }
//                                            ?>
<!--                                        </td>-->
                                        <td>
                                            <a href="<?php echo site_url('user-dash/' . $value->user_id);?>" target="_blank" class="btn btn-primary btn-xs">Login</a>
                                            <div  class="btn-group btn-group-xs" role="group">
                                                <a class="btn btn-info" href="<?php echo site_url('users/edit/' . $value->id);?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
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
