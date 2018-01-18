<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Credential</h5>
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

                    <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post" enctype='multipart/form-data'>
                        <div class="modal-body">
                            <div class="form-group ">
                                <label class="control-label col-lg-2 required">Credential Type</label>
                                <div class="col-lg-4 <?php echo(form_error('tab_086_credential_type') != '' ? 'has-error' : '');?>">
                                    <select name="tab_086_credential_type" class="form-control" <?php echo set_select('tab_086_credential_type');?> ><!--required="">-->
                                        <option value="" selected disabled>Select</option>
                                        <option value="A" <?php echo(set_select('tab_086_credential_type', 'A'));?>>
                                            type 1
                                        </option>
                                        <option value="C" <?php echo set_select('tab_086_credential_type', 'C');?>>
                                            type 2
                                        </option>
                                        <option value="D" <?php echo set_select('tab_086_credential_type', 'D');?>>
                                            type 3
                                        </option>
                                    </select>
                                    <?php echo form_error('tab_086_credential_type', '<div class="">', '</div>'); ?>
                                </div>

                                <label class="control-label col-lg-2 required">Credential Id</label>
                                <div class="col-lg-4 <?php echo(form_error('credential_id') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="credential_id" placeholder="Credential ID" value="<?php set_value('credential_id');?>" /><!--required=""/>-->
                                    <?php echo form_error('credential_id', '<div class="help-block">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group" id="expiration_date">
                                <label class="control-label col-lg-2 required">Expiration Date</label>
                                <div class="col-lg-4 <?php echo(form_error('expiration_date') != '' ? 'has-error' : '');?>">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014" name="expiration_date">
                                    </div>
                                    <?php echo form_error('expiration_date', '<div class="">', '</div>'); ?>
                                </div>

                                <label class="control-label col-lg-2 required">Alert days</label>
                                <div class="col-lg-4  <?php echo(form_error('alert_days') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="alert_days" placeholder="Alert Days" value="<?php echo (isset($current_agency) ? $current_agency->alert_days: set_value('alert_days'));?>" /><!--required=""/>-->
                                    <?php echo form_error('alert_days', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 required">Upload Credential Copy</label>
                                <div class="col-lg-6  <?php echo(form_error('attachment') != '' ? 'has-error' : '');?>">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="attachment"></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    <?php echo form_error('attachment', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 required">Notes</label>
                                <div class="col-lg-10 <?php echo(form_error('notes') != '' ? 'has-error' : '');?>">
                                    <textarea name="notes" class="form-control"></textarea>
                                    <?php echo form_error('notes', '<div class="">', '</div>'); ?>
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
                            if (isset($upload_error)) { ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php
                                        foreach ($upload_error as $err) {
                                            echo('<li>' . $err . '</li>');
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo site_url('agency')?>" class="btn btn-white">Close</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $('#expiration_date .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
</script>