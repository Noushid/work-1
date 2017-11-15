<?php
if (isset($modal_opened) and $modal_opened == true) {
    ?>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#myModal').modal('show');
        });
    </script>
<?php
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Agency</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>agency</strong>
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
                    <h5>Agency List</h5>
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
                    <div class="">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Add a new Agency
                        </button>
                    </div>

                    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <a href="<?php echo site_url('agency');?>" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
                                    <?php
                                    if (isset($current_agency)) { ?>
                                        <h4 class="modal-title">Edit  Agency</h4>
                                        <small>Edit the given agency.</small>
                                    <?php }else{ ?>
                                        <h4 class="modal-title">Create Agency</h4>
                                        <small>Create a new agency.</small>
                                    <?php }
                                    ?>

                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group ">
                                            <label class="control-label col-lg-2 required">Name</label>
                                            <div class="col-lg-4 <?php echo(form_error('agency_name') != '' ? 'has-error' : '');?>">
                                                <input class="form-control" type="text" name="agency_name" placeholder="Agency Name" value="<?php echo(isset($current_agency) ? $current_agency->agency_name : set_value('agency_name'));?>" required=""/>
                                                <?php echo form_error('name', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                            <label class="control-label col-lg-2 required">Type</label>
                                            <div class="col-lg-4 <?php echo(form_error('agency_type') != '' ? 'has-error' : '');?>">
                                                <select name="agency_type" class="form-control" <?php echo set_select('agency_type');?> required="">
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="A" <?php echo((isset($current_agency) && $current_agency->agency_type == 'A') ? 'selected' : '');
                                                    echo set_select('agency_type', 'A');?>>
                                                        Agency
                                                    </option>
                                                    <option value="C" <?php echo((isset($current_agency) && $current_agency->agency_type == 'C') ? 'selected' : '');
                                                    echo set_select('agency_type', 'C');?>>
                                                        Contractor
                                                    </option>
                                                    <option value="D" <?php echo((isset($current_agency) && $current_agency->agency_type == 'D') ? 'selected' : '');
                                                    echo set_select('agency_type', 'D');?>>
                                                        Doctor office
                                                    </option>
                                                </select>
                                                <?php echo form_error('agency_type', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 required">Status</label>
                                            <div class="col-lg-4 <?php echo(form_error('agency_status') != '' ? 'has-error' : '');?>">
                                                <select name="agency_status" class="form-control" <?php echo set_select('agency_status');?> required="">
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="Act" <?php echo((isset($current_agency) && $current_agency->agency_status == 'Act') ? 'selected' : '');
                                                    echo set_select('agency_status', 'Act');?>>Active</option>
                                                    <option value="Inact" <?php echo((isset($current_agency) && $current_agency->agency_status == "Inact") ? 'selected' : '');
                                                    echo set_select('agency_status', 'Inact');?>>Inactive</option>
                                                    <option value="SA" <?php echo((isset($current_agency) && $current_agency->agency_status == 'SA') ? 'selected' : '');
                                                    echo set_select('agency_status', 'SA');?>>Stand alone</option>
                                                </select>
                                                <?php echo form_error('agency_status', '<div class="">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2 required">Contact Name</label>
                                            <div class="col-lg-4  <?php echo(form_error('contact_name') != '' ? 'has-error' : '');?>">
                                                <input class="form-control" type="text" name="contact_name" placeholder="Contact Name" value="<?php echo (isset($current_agency) ? $current_agency->contact_name: set_value('contact_name'));?>" required=""/>
                                                <?php echo form_error('contact_name', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label class="control-label col-lg-2 required">Contact Phone</label>
                                            <div class="col-lg-4  <?php echo(form_error('contact_phone') != '' ? 'has-error' : '');?>">
                                                <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Contact Phone Number" name="contact_phone" value="<?php echo (isset($current_agency) ? $current_agency->contact_phone: set_value('contact_phone'));?>" required=""/>
                                                <span class="help-block">(999) 999-9999</span>
                                                <?php echo form_error('contact_phone', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('agency')?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-agency ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Contact Name</th>
                                <th>Contact Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($agencies) and $agencies != FALSE) {
                                $i = 1;
                                foreach ($agencies as $agency) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo site_url('agency/' . $agency->agency_id);?>"><?php echo $agency->agency_name; ?></a></td>
                                        <td><?php echo $agency->agency_type; ?></td>
                                        <td><?php echo $agency->agency_status; ?></td>
                                        <td><?php echo $agency->contact_name; ?></td>
                                        <td><?php echo $agency->contact_phone; ?></td>
                                        <td class="center">
                                            <div  class="btn-group btn-group-xs" role="group">
                                                <a class="btn btn-info" href="<?php echo site_url('agency/edit/' . $agency->agency_id);?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo site_url('agency/delete/' . $agency->agency_id);?>">
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
