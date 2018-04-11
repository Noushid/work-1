<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Agency</h5>
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
                    <form action="<?php echo site_url('agency')?>" class="form-horizontal" method="post">
                        <?php
                        if(validation_errors() != '') {
                            ?>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php echo validation_errors('<li>', '</li>') ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <fieldset class="the-fieldset">
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3 required">Agency Name</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_name') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="agency_name" value="<?php echo(isset($current_agency) ? $current_agency->agency_name : set_value('agency_name'));?>" />
<!--                                    --><?php //echo form_error('agency_name', '<div class="help-block">', '</div>'); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="the-fieldset" >
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3 required">Type</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_type') != '' ? 'has-error' : '');?>">
                                    <div class="radio radio-info radio-inline">
                                        <input id="typeRadio1" value="A" type="radio" name="agency_type" <?php echo set_radio('agency_type', 'A'); ?>>
                                        <label for="typeRadio1"> Agency</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input id="typeRadio2" value="C" type="radio" name="agency_type" <?php echo set_radio('agency_type', 'C'); ?> >
                                        <label for="typeRadio2"> Contractor</label>
                                    </div>
                                    <div class="radio radio-info radio-inline disabled">
                                        <input id="typeRadio3" value="D" type="radio" name="agency_type" <?php echo set_radio('agency_type', 'D'); ?>>
                                        <label for="typeRadio3"> Doctor Office </label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3 required">Status</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_status') != '' ? 'has-error' : '');?>">
                                    <div class="radio radio-info radio-inline">
                                        <input id="statusRadio1" value="Act" type="radio" name="agency_status" <?php echo(isset($current_agency) ? ($current_agency->agency_status == 'Act' ? 'checked' :'' ) : set_radio('agency_status', 'Act')); ?> >
                                        <label for="statusRadio1"> Active </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input id="statusRadio2" value="inact" type="radio" name="agency_status" <?php echo(isset($current_agency) ? ($current_agency->agency_status == 'Inact' ? 'checked' :'' ) : set_radio('agency_status', 'Inact')); ?>>
                                        <label for="statusRadio2"> Inactive </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input id="statusRadio3" value="SA" type="radio" name="agency_status" <?php echo(isset($current_agency) ? ($current_agency->agency_status == 'SA' ? 'checked' :'' ) : set_radio('agency_status', 'SA')); ?>>
                                        <label for="statusRadio3"> Stand-alone </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="the-fieldset">
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">Address</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('address') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="address" value="<?php echo (isset($current_agency) ? $current_agency->address: set_value('address'));?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">City</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('city') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="city" value="<?php echo (isset($current_agency) ? $current_agency->city: set_value('city'));?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3 required">State</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('state') != '' ? 'has-error' : '');?>">
                                    <select name="state" class="form-control" <?php echo set_select('state');?> >
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        if (isset($states) and $states != false) {
                                            foreach ($states as $state) { ?>
                                                <option value="<?php echo $state->state_id;?>" <?php echo set_select('state', $state->state_id);?>><?php echo $state->state_name_long;?></option>
                                            <?php }

                                        }
                                        ?>
                                    </select>
                                    <!--                                        --><?php //echo form_error('state', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">Zip Code</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('zipcode') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="zipcode" value="<?php echo (isset($current_agency) ? $current_agency->zip: set_value('zipcode'));?>" />
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="the-fieldset">

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3 required">Contact Name</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('contact_name') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="contact_name" value="<?php echo (isset($current_agency) ? $current_agency->contact_name: set_value('contact_name'));?>" />
                                    <!--                                                --><?php //echo form_error('contact_name', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3 required">Contact Phone</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('contact_phone') != '' ? 'has-error' : '');?>">
                                    <input type="text" class="form-control" data-mask="(999) 999-9999" name="contact_phone" value="<?php echo (isset($current_agency) ? $current_agency->contact_phone: set_value('contact_phone'));?>" id="phone" />
                                    <!--                                                --><?php //echo form_error('contact_phone', '<div class="">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">Fax</label>
                                <div class="col-lg-5 col-md-6<?php echo(form_error('fax') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="fax" id="fax" data-mask="(999) 999-9999" value="<?php echo (isset($current_agency) ? $current_agency->fax: set_value('fax'));?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">Email</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_email') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="email" name="agency_email" value="<?php echo (isset($current_agency) ? $current_agency->agency_email: set_value('agency_email'));?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">Web Address</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('web_address') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="web_address" value="<?php echo (isset($current_agency) ? $current_agency->web_address: set_value('web_address'));?>" /><!--/>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">Time zone</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('timezone') != '' ? 'has-error' : '');?>">
                                    <select name="timezone" class="form-control" <?php echo set_select('timezone');?>>
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        if (isset($timezone) and $timezone != false) {
                                            foreach ($timezone as $time) { ?>
                                                <option value="<?php echo $time->tab_value;?>" <?php echo set_select('timezone', $time->tab_value);?>><?php echo $time->tab_description;?></option>
                                            <?php }

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="the-fieldset">
                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">PO Box Address</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('po_box_address') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="po_box_address" value="<?php echo (isset($current_agency) ? $current_agency->po_box_address: set_value('po_box_address'));?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">PO Box City</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('po_box_city') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="po_box_city"  value="<?php echo (isset($current_agency) ? $current_agency->po_box_city: set_value('po_box_city'));?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">PO Box State</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('po_box_state_id') != '' ? 'has-error' : '');?>">
                                    <select name="po_box_state_id" class="form-control" <?php echo set_select('po_box_state_id');?>>
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        if (isset($states) and $states != false) {
                                            foreach ($states as $state) { ?>
                                                <option value="<?php echo $state->state_id;?>" <?php echo set_select('po_box_state_id', $state->state_id);?>><?php echo $state->state_name_long;?></option>
                                            <?php }

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-lg-2 col-md-3">PO Box Zip Code</label>
                                <div class="col-lg-5 col-md-6 <?php echo(form_error('po_zip1') != '' ? 'has-error' : '');?>">
                                    <input class="form-control" type="text" name="po_zip1"  value="<?php echo (isset($current_agency) ? $current_agency->po_zip1: set_value('po_zip1'));?>" />
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="the-fieldset bg-muted">
                            <legend></legend>
                            <div class="form-group">
                                <div class="m-l-lg">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="<?php echo site_url('agency')?>" class="btn btn-white">Close</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $('#phone').inputmask({
        mask: '?(999) 999-9999',
        autoclear: true
    });
    $('#fax').inputmask({
        mask: '?(999) 999-9999',
        autoclear: true
    });
    $('#phone').change(function () {
        if($(this).val().length < 14) {
            $('#data_phone').addClass('has-error');
        }else{
            $('#data_phone').removeClass('has-error');
        }
    });

    $('#fax').inputmask({
        mask: '?99-9999999',
        autoclear: true
    });
</script>