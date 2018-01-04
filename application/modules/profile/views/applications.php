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
            <li>
                <a href="<?php echo site_url('x-profile/' . $profile_id);?>">group</a>
            </li>
            <li class="active">
                <strong>application</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Application List</h5>
                </div>
                <div class="ibox-content">
                    <div class="modal inmodal" id="applicationModal" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <a href="<?php echo current_url();?>" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
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
                                            <label class="control-label col-lg-3 required">Application Name</label>
                                            <div class="col-lg-8 <?php echo(form_error('application_name') != '' ? 'has-error' : '');?>">
                                                <input class="form-control" type="text" name="application_name" placeholder="Application Name" value="<?php echo(isset($current_profile) ? $current_profile->application_name : set_value('application_name'));?>" /><!--required=""/>-->
<!--                                                    --><?php //echo form_error('application_name', '<div class="help-block">', '</div>'); ?>
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
                                        <a href="<?php echo current_url()?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-x-application">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Application name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($applications) and $applications != FALSE) {
                                $i = 1;
                                foreach ($applications as $application) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $application->profile_group_applica_id; ?></td>
                                        <td><?php echo $application->x_application->application_name; ?></td>
                                        <td class="center"><a onclick="return alertConfirm(this);" href="<?php echo current_url() . '/delete/' . $application->profile_group_applica_id;?>" class="btn btn-danger btn-xs">delete</a></td>
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
