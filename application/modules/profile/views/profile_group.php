<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Group List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('x-profile');?>">x-profile</a>
            </li>
            <li class="active">
                <strong>group</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Group List</h5>
                </div>
                <div class="ibox-content">
                    <div class="modal inmodal" id="ProfileModel" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <a href="<?php echo site_url('x-profile');?>" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
                                    <?php
                                    if (isset($current_profile)) { ?>
                                        <h4 class="modal-title">Edit Profile</h4>
                                        <small>Edit the given X-profile.</small>
                                    <?php }else{ ?>
                                        <h4 class="modal-title">Create Profile</h4>
                                        <small>Create a new X-profile.</small>
                                    <?php }
                                    ?>

                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2 required">Profile Name</label>
                                            <div class="col-lg-4 <?php echo(form_error('profile_name') != '' ? 'has-error' : '');?>">
                                                <input class="form-control" type="text" name="profile_name" placeholder="Profile Name" value="<?php echo(isset($current_profile) ? $current_profile->profile_name : set_value('profile_name'));?>" /><!--required=""/>-->
                                                <!--                                                --><?php //echo form_error('profile_name', '<div class="help-block">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2 required">Profile Desc</label>
                                            <div class="col-lg-4 <?php echo(form_error('profile_desc') != '' ? 'has-error' : '');?>">
                                                <input class="form-control" type="text" name="profile_desc" placeholder="Profile Desc" value="<?php echo(isset($current_profile) ? $current_profile->profile_desc : set_value('profile_desc'));?>" /><!--required=""/>-->
                                                <!--                                                --><?php //echo form_error('profile_desc', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 required">Show Manager</label>
                                            <div class="col-lg-4 <?php echo(form_error('show_manager') != '' ? 'has-error' : '');?>">
                                                <select name="show_manager" class="form-control" <?php echo set_select('show_manager');?> ><!--required="">-->
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="1" <?php echo((isset($current_profile) && $current_profile->show_manager == "1") ? 'selected' : '');
                                                    echo set_select('show_manager', '1');?>>Yes</option>
                                                    <option value="0" <?php echo((isset($current_profile) && $current_profile->show_manager == "0") ? 'selected' : '');
                                                    echo set_select('show_manager', '0');?>>No</option>
                                                </select>
                                                <!--                                                --><?php //echo form_error('show_manager', '<div class="">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2 required">Show Independ</label>
                                            <div class="col-lg-4 <?php echo(form_error('show_independ') != '' ? 'has-error' : '');?>">
                                                <select name="show_independ" class="form-control" <?php echo set_select('show_independ');?> ><!--required="">-->
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="1" <?php echo((isset($current_profile) && $current_profile->show_independ == "1") ? 'selected' : '');
                                                    echo set_select('show_independ', '1');?>>Yes</option>
                                                    <option value="0" <?php echo((isset($current_profile) && $current_profile->show_independ == "0") ? 'selected' : '');
                                                    echo set_select('show_independ', '0');?>>No</option>
                                                </select>
                                                <!--                                                --><?php //echo form_error('show_independ', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 required">Profile Agency</label>
                                            <div class="col-lg-4  <?php echo(form_error('profile_agency') != '' ? 'has-error' : '');?>">
                                                <select name="profile_agency" class="form-control" <?php echo set_select('profile_agency');?> ><!--required="">-->
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="1" <?php echo((isset($current_profile) && $current_profile->profile_agency == "1") ? 'selected' : '');
                                                    echo set_select('profile_agency', '1');?>>Yes</option>
                                                    <option value="0" <?php echo((isset($current_profile) && $current_profile->profile_agency == "0") ? 'selected' : '');
                                                    echo set_select('profile_agency', '0');?>>No</option>
                                                </select>
                                                <!--                                                --><?php //echo form_error('profile_agency', '<div class="">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2 required">Profile Contractor</label>
                                            <div class="col-lg-4  <?php echo(form_error('profile_contractor') != '' ? 'has-error' : '');?>">
                                                <select name="profile_contractor" class="form-control" <?php echo set_select('profile_contractor');?> ><!--required="">-->
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="1" <?php echo((isset($current_profile) && $current_profile->profile_contractor == "1") ? 'selected' : '');
                                                    echo set_select('profile_contractor', '1');?>>Yes</option>
                                                    <option value="0" <?php echo((isset($current_profile) && $current_profile->profile_contractor == "0") ? 'selected' : '');
                                                    echo set_select('profile_contractor', '0');?>>No</option>
                                                </select>
                                                <!--                                                --><?php //echo form_error('profile_contractor', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <?php
                                        if(validation_errors() != '') {
                                            ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php echo validation_errors('<li>', '</li>') ?>
                                                </ul>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('x-profile')?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-x-profile-group ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Group name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($profile_group) and $profile_group != FALSE) {
                                $i = 1;
                                foreach ($profile_group as $group) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $group->group_id; ?></td>
                                        <td><?php echo (isset($group->x_group) ? $group->x_group->group_name : '')?></td>
                                        <td class="center"><a href="<?php echo current_url() . '/application/' . $group->profile_group_id;?>" class="btn btn-info btn-xs">application</a></td>
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
