<?php
if (isset($modal_opened) and $modal_opened == true) {
    ?>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#ProfileModel').modal('show');
        });
    </script>
<?php
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>profile</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile List</h5>
<!--                    <div class="ibox-tools">-->
<!--                        <a class="collapse-link">-->
<!--                            <i class="fa fa-chevron-up"></i>-->
<!--                        </a>-->
<!--                        <a class="close-link">-->
<!--                            <i class="fa fa-times"></i>-->
<!--                        </a>-->
<!--                    </div>-->
                </div>
                <div class="ibox-content">
                    <div class="modal inmodal" id="ProfileModel" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <a href="<?php echo site_url('profile');?>" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
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
                                            <label class="control-label col-lg-2 required">Agency profile </label>
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
                                        <a href="<?php echo site_url('profile')?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-profile ">
                            <thead>
                            <tr>
                                <th>Profile Id</th>
                                <th>Profile Name</th>
                                <th>Profile Desc</th>
                                <th>Agency Profile</th>
                                <th>Contractor profile</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($profiles) and $profiles != FALSE) {
                                $i = 1;
                                foreach ($profiles as $profile) {
                                    ?>
                                    <tr>
                                        <td><?php echo $profile->profile_id; ?></td>
                                        <td><a href="<?php echo current_url() . '/' . $profile->profile_id;?>"><?php echo $profile->profile_name; ?></a></td>
                                        <td><?php echo $profile->profile_desc; ?></td>
                                        <td><?php echo ($profile->profile_agency == 1 ? '<i class="fa fa-check-circle" style="color: #5bc0de"></i>' : '<i class="fa fa-times-circle" style="color: #ff0011"></i>')?></td>
                                        <td><?php echo ($profile->profile_contractor == 1 ? '<i class="fa fa-check-circle" style="color: #5bc0de"></i>' : '<i class="fa fa-times-circle" style="color: #ff0011"></i>')?></td>
<!--                                        <td>--><?php //echo $profile->show_manager; ?><!--</td>-->
<!--                                        <td>--><?php //echo $profile->profile_contractor; ?><!--</td>-->
                                        <td class="center">
                                            <div  class="btn-group btn-group-xs" role="group">
                                                <a href="<?php echo current_url() . '/' . $profile->profile_id;?>" class="btn btn-primary btn-xs">menu</a>
                                                <a class="btn btn-info" href="<?php echo current_url().'/edit/' . $profile->profile_id;?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
<!--                                                <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="--><?php //echo site_url('profile/delete/' . $profile->profile_id);?><!--">-->
<!--                                                    <i class="fa fa-trash-o"></i>-->
<!--                                                </a>-->

                                            </div>
                                        </td>

                                        <td class="center"></td>
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
