<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Agency</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li >
                <a href="<?php echo site_url('contractor');?>">Contractor</a>
            </li>
            <li class="active">
                <strong>Add</strong>
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
    <h5><i class="fa fa-plus-square fa-primary" style=""></i> Add New Contractor</h5>
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
    <?php echo form_open(site_url(uri_string()), ['class' => "form-horizontal"]);?>
        <fieldset class="the-fieldset m-t-lg">
            <legend class="the-legend"><i class="fa fa-caret-right fa-primary"></i> Agency Name</legend>
            <div class="form-group ">
                <label class="control-label col-lg-2 required">Name</label>
                <div class="col-lg-4 <?php echo(form_error('agency_name') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="agency_name" placeholder="Agency Name" value="<?php echo(isset($current_agency) ? $current_agency->agency_name : set_value('agency_name'));?>"/>
                    <?php echo form_error('agency_name', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>
        </fieldset>

        <fieldset class="the-fieldset m-t-lg" >
            <legend class="the-legend"><i class="fa fa-caret-right fa-primary"></i> Type & Status</legend>
            <div class="form-group">
                <label class="control-label col-lg-2 required">Type</label>
                <div class="col-lg-4 <?php echo(form_error('agency_type') != '' ? 'has-error' : '');?>">
                    <input type="hidden" name="agency_type" value="C"/>
                    <select name="agency_type" class="form-control" <?php echo set_select('agency_type');?> disabled><!--required="">-->
                        <option value="" selected disabled>Select</option>
                        <option value="A" <?php echo((isset($current_agency) && $current_agency->agency_type == 'A') ? 'selected' : '');
                        echo set_select('agency_type', 'A');?>>
                            Agency
                        </option>
                        <option value="C" <?php echo((isset($current_agency) && $current_agency->agency_type == 'C') ? 'selected' : 'selected');
                        echo set_select('agency_type', 'C');?>>
                            Contractor
                        </option>
                        <option value="D" <?php echo((isset($current_agency) && $current_agency->agency_type == 'D') ? 'selected' : '');
                        echo set_select('agency_type', 'D');?>>
                            Doctor office
                        </option>
                    </select>
                    <!--                                                --><?php //echo form_error('agency_type', '<div class="">', '</div>'); ?>
                </div>
                <label class="control-label col-lg-2 required">Status</label>
                <div class="col-lg-4 <?php echo(form_error('agency_status') != '' ? 'has-error' : '');?>">
                    <select name="agency_status" class="form-control" <?php echo set_select('agency_status');?> required="">>
                        <option value="" selected disabled>Select</option>
                        <option value="Act" <?php echo((isset($current_agency) && $current_agency->agency_status == 'Act') ? 'selected' : '');
                        echo set_select('agency_status', 'Act');?>>Active</option>
                        <option value="Inact" <?php echo((isset($current_agency) && $current_agency->agency_status == "Inact") ? 'selected' : '');
                        echo set_select('agency_status', 'Inact');?>>Inactive</option>
                        <option value="SA" <?php echo((isset($current_agency) && $current_agency->agency_status == 'SA') ? 'selected' : '');
                        echo set_select('agency_status', 'SA');?>>Stand-alone</option>
                    </select>
                    <?php echo form_error('agency_status', '<div class="">', '</div>'); ?>
                </div>
            </div>
        </fieldset>

        <fieldset class="the-fieldset m-t-lg" >
            <legend class="the-legend"><i class="fa fa-caret-right fa-primary"></i> Demographics</legend>
            <div class="form-group">
                <label class="control-label col-lg-2">Address</label>
                <div class="col-lg-4  <?php echo(form_error('address') != '' ? 'has-error' : '');?>">
                    <textarea name="address" id="address" class="form-control"><?php echo (isset($current_agency) ? $current_agency->address: set_value('address'));?></textarea>
                </div>

                <label class="control-label col-lg-2">City</label>
                <div class="col-lg-4  <?php echo(form_error('city') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="city" placeholder="City" value="<?php echo (isset($current_agency) ? $current_agency->city: set_value('city'));?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2 required">State</label>
                <div class="col-lg-4 <?php echo(form_error('state') != '' ? 'has-error' : '');?>">
                    <select name="state" class="form-control" <?php echo set_select('state');?> required="">>
                        <option value="" selected disabled>Select</option>
                        <?php
                        if (isset($states) and $states != false) {
                            foreach ($states as $state) { ?>
                                <option value="<?php echo $state->state_id;?>" <?php echo set_select('state', $state->state_id);?>><?php echo $state->state_name_long;?></option>
                            <?php }

                        }
                        ?>
                    </select>
                    <?php echo form_error('state', '<div class="">', '</div>'); ?>
                </div>

                <label class="control-label col-lg-2">Zip Code</label>
                <div class="col-lg-4  <?php echo(form_error('zipcode') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="zipcode" placeholder="Zip code" value="<?php echo (isset($current_agency) ? $current_agency->zip: set_value('zipcode'));?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Time zone</label>
                <div class="col-lg-4  <?php echo(form_error('timezone') != '' ? 'has-error' : '');?>">
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
        <fieldset class="the-fieldset m-t-lg">
            <legend class="the-legend"> <i class="fa fa-caret-right fa-primary"></i> Contact Information (Name, Phone, Fax, Email)</legend>

            <div class="form-group">
                <label class="control-label col-lg-2 required">Contact Name</label>
                <div class="col-lg-4  <?php echo(form_error('contact_name') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="contact_name" placeholder="Contact Name" value="<?php echo (isset($current_agency) ? $current_agency->contact_name: set_value('contact_name'));?>" required=""/>/>
                    <?php echo form_error('contact_name', '<div class="">', '</div>'); ?>
                </div>

                <label class="control-label col-lg-2 required">Contact Phone</label>
                <div class="col-lg-4  <?php echo(form_error('contact_phone') != '' ? 'has-error' : '');?>">
                    <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Contact Phone Number" name="contact_phone" value="<?php echo (isset($current_agency) ? $current_agency->contact_phone: set_value('contact_phone'));?>" id="phone" required=""/>
                    <span class="help-block">(999) 999-9999</span>
                    <?php echo form_error('contact_phone', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Fax</label>
                <div class="col-lg-4  <?php echo(form_error('fax') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="fax" id="fax" data-mask="99-9999999" placeholder="Fax" value="<?php echo (isset($current_agency) ? $current_agency->fax: set_value('fax'));?>" />
                </div>

                <label class="control-label col-lg-2">Email</label>
                <div class="col-lg-4  <?php echo(form_error('agency_email') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="email" name="agency_email" placeholder="Email" value="<?php echo (isset($current_agency) ? $current_agency->agency_email: set_value('agency_email'));?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Web Address</label>
                <div class="col-lg-4  <?php echo(form_error('web_address') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="web_address" placeholder="Web Address" value="<?php echo (isset($current_agency) ? $current_agency->web_address: set_value('web_address'));?>" /><!--required=""/>-->
                </div>
            </div>
        </fieldset>

        <fieldset class="the-fieldset m-t-lg">
            <legend class="the-legend"><i class="fa fa-caret-right fa-primary"></i> PO Box Information</legend>
            <div class="form-group">
                <label class="control-label col-lg-2">Address</label>
                <div class="col-lg-4  <?php echo(form_error('po_box_address') != '' ? 'has-error' : '');?>">
                    <textarea name="po_box_address" id="po_box_address" class="form-control"><?php echo (isset($current_agency) ? $current_agency->po_box_address: set_value('po_box_address'));?></textarea>
                </div>

                <label class="control-label col-lg-2">City</label>
                <div class="col-lg-4  <?php echo(form_error('po_box_city') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="po_box_city" placeholder="City" value="<?php echo (isset($current_agency) ? $current_agency->po_box_city: set_value('po_box_city'));?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">State</label>
                <div class="col-lg-4 <?php echo(form_error('po_box_state_id') != '' ? 'has-error' : '');?>">
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

                <label class="control-label col-lg-2">Zip code</label>
                <div class="col-lg-4  <?php echo(form_error('po_zip1') != '' ? 'has-error' : '');?>">
                    <input class="form-control" type="text" name="po_zip1"  placeholder="Zip" value="<?php echo (isset($current_agency) ? $current_agency->po_zip1: set_value('po_zip1'));?>" />
                </div>
            </div>
        </fieldset>
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
        <div class="form-group text-center">
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
    $('#phone').inputmask({
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