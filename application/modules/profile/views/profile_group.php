<?php
if (isset($modal_opened) and $modal_opened == true) {
    ?>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#profileGroupModal').modal('show');
        });
    </script>
<?php
}
?>

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
                    <h5><?php echo $this->profile->where('profile_id', $profile_id)->get()->profile_name;?></h5>
                </div>
                <div class="ibox-content">
                    <div class="modal inmodal" id="profileGroupModal" tabindex="-1" role="dialog"  aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <a href="<?php echo site_url('x-profile/' . $profile_id);?>" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
                                    <?php
                                    if (isset($current_profile_group)) { ?>
                                        <h4 class="modal-title">Edit Profile Group</h4>
                                        <small>Edit the given profile group.</small>
                                    <?php }else{ ?>
                                        <h4 class="modal-title">Create Profile Group</h4>
                                        <small>Create a new profile Group.</small>
                                    <?php }
                                    ?>

                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2 required">Group Name</label>
                                            <div class="col-lg-8 <?php echo(form_error('group') != '' ? 'has-error' : '');?>">
                                                <select name="group" class="form-control" <?php echo set_select('group');?> ><!--required="">-->
                                                    <option value="" selected disabled>Select</option>
                                                    <?php
                                                    foreach ($groups as $group) {
                                                        ?>
                                                        <option value="<?php echo $group->group_id?>" ><?php echo $group->group_name?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
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
                                        <a href="<?php echo site_url('x-profile/' . $profile_id);?>" class="btn btn-white">Close</a>
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
                                        <td class="center">
                                            <a href="<?php echo current_url() . '/application/' . $group->profile_group_id;?>" class="btn btn-primary btn-xs">application</a>

                                            <div  class="btn-group btn-group-xs" role="group">
<!--                                                <a class="btn btn-info" href="--><?php //echo current_url() . '/edit/' . $group->profile_group_id;?><!--">-->
<!--                                                    <i class="fa fa-pencil"></i>-->
<!--                                                </a>-->
                                                <a class="btn btn-danger" onclick="return alertConfirm(this);" href="<?php echo current_url() . '/delete/' . $group->profile_group_id;?>">
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
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
