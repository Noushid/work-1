<?php
if (isset($_SESSION['active_tab'])) {
    $active_tab = $_SESSION['active_tab'];
}
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
<script>
    $(document).ready(function () {
        $('#myTab a[href="#tab2"]').tab('show'); // Select tab by name


        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');

        $('.nav-tabs a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });

    });
</script>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="font-normal">Agency Name &nbsp;<span class="text-primary" style="font-size: 18px;font-weight: 600px;color: #1ab394;"> <?php echo $agency->agency_name;?></span></h5>
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
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" id="agencySingleTab">
                            <li class="<?php echo(!isset($active_tab) ? 'active' :  (isset($active_tab) && $active_tab == 'tab-1') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-1">Agency Details</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-2') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-2">Agency Settings</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-3') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-3">Agency Users</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'contractors') ? 'active' : '');?>"><a data-toggle="tab" href="#contractors">Contractors</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'doctors') ? 'active' : '');?>"><a data-toggle="tab" href="#doctors">Doctors</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'comments') ? 'active' : '');?>"><a data-toggle="tab" href="#comments">Comments</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'patients') ? 'active' : '');?>"><a data-toggle="tab" href="#patients">Patients</a></li>
                            <li class="<?php echo((isset($active_tab) && $active_tab == 'visitLog') ? 'active' : '');?>"><a data-toggle="tab" href="#visitLog">Visit Log</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane <?php echo(!isset($active_tab) ? 'active' :  (isset($active_tab) && $active_tab == 'tab-1') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="">
                                            <h5 class="font-normal"><span class="text-primary" style="font-size: 18px;font-weight: 600px;color: #1ab394;"> Edit Agency</span></h5>
                                        </div>
                                        <div class="ibox-content">
                                            <?php echo form_open(site_url('agency/edit/' . $agency->agency_id), ['class' => "form-horizontal", "id" => "agencyDetailsForm"]);?>
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
                                                            <input class="form-control" type="text" name="agency_name" value="<?php echo(isset($agency) ? $agency->agency_name : set_value('agency_name'));?>"/>
                                                            <!--                                                --><?php //echo form_error('agency_name', '<div class="help-block">', '</div>'); ?>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="the-fieldset" >
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3 required">Type</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_type') != '' ? 'has-error' : '');?>">
                                                            <input value="<?php echo $agency->agency_type;?>" type="hidden" name="agency_type">
                                                            <div class="radio radio-info radio-inline">
                                                                <input disabled id="typeRadio1" value="A" type="radio" name="agency_type" <?php echo(isset($agency) ? ($agency->agency_type == 'A' ? 'checked' :'' ) : set_radio('agency_type', 'A')); ?>>
                                                                <label for="typeRadio1"> Agency</label>
                                                            </div>
                                                            <div class="radio radio-info radio-inline">
                                                                <input disabled id="typeRadio2" value="C" type="radio" name="agency_type" <?php echo(isset($agency) ? ($agency->agency_type == 'C' ? 'checked' :'' ) : set_radio('agency_type', 'C')); ?>>
                                                                <label for="typeRadio2"> Contractor</label>
                                                            </div>
                                                            <div class="radio radio-info radio-inline disabled">
                                                                <input disabled id="typeRadio3" value="D" type="radio" name="agency_type" <?php echo(isset($agency) ? ($agency->agency_type == 'D' ? 'checked' :'' ) : set_radio('agency_type', 'D')); ?>>
                                                                <label for="typeRadio3"> Doctor Office </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3 required">Status</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_status') != '' ? 'has-error' : '');?>">
                                                            <div class="radio radio-info radio-inline">
                                                                <input id="statusRadio1" value="Act" type="radio" name="agency_status" <?php echo(isset($agency) ? ($agency->agency_status == 'Act' ? 'checked' :'' ) : set_radio('agency_status', 'Act')); ?>>
                                                                <label for="statusRadio1"> Active </label>
                                                            </div>
                                                            <div class="radio radio-info radio-inline">
                                                                <input id="statusRadio2" value="inact" type="radio" name="agency_status" <?php echo(isset($agency) ? ($agency->agency_status == 'Inact' ? 'checked' :'' ) : set_radio('agency_status', 'Inact')); ?>>
                                                                <label for="statusRadio2"> Inactive </label>
                                                            </div>
                                                            <div class="radio radio-info radio-inline">
                                                                <input id="statusRadio3" value="SA" type="radio" name="agency_status" <?php echo(isset($agency) ? ($agency->agency_status == 'SA' ? 'checked' :'' ) : set_radio('agency_status', 'SA')); ?>>
                                                                <label for="statusRadio3"> Stand-alone </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="the-fieldset">
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3">Address</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('address') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="text" name="address" value="<?php echo (isset($agency) ? $agency->address: set_value('address'));?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3">City</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('city') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="text" name="city" value="<?php echo (isset($agency) ? $agency->city: set_value('city'));?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3 required">State</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('state') != '' ? 'has-error' : '');?>">
                                                            <select name="state" class="form-control" <?php echo set_select('state');?>>
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
                                                            <input class="form-control" type="text" name="zipcode" value="<?php echo (isset($agency) ? $agency->zip: set_value('zipcode'));?>" />
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="the-fieldset">

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3 required">Contact Name</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('contact_name') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="text" name="contact_name" value="<?php echo (isset($agency) ? $agency->contact_name: set_value('contact_name'));?>"/>
                                                            <!--                                                --><?php //echo form_error('contact_name', '<div class="">', '</div>'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3 required">Contact Phone</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('contact_phone') != '' ? 'has-error' : '');?>">
                                                            <input type="text" class="form-control" data-mask="(999) 999-9999" name="contact_phone" value="<?php echo (isset($agency) ? $agency->contact_phone: set_value('contact_phone'));?>" id="phone"/>
                                                            <!--                                                --><?php //echo form_error('contact_phone', '<div class="">', '</div>'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3">Fax</label>
                                                        <div class="col-lg-5 col-md-6<?php echo(form_error('fax') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="text" name="fax" id="fax" data-mask="(999) 999-9999" value="<?php echo (isset($agency) ? $agency->fax: set_value('fax'));?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3">Email</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('agency_email') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="email" name="agency_email" value="<?php echo (isset($agency) ? $agency->agency_email: set_value('agency_email'));?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3">Web Address</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('web_address') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="text" name="web_address" value="<?php echo (isset($agency) ? $agency->web_address: set_value('web_address'));?>" />
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
                                                            <input class="form-control" type="text" name="po_box_address" value="<?php echo (isset($agency) ? $agency->po_box_address: set_value('po_box_address'));?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-lg-2 col-md-3">PO Box City</label>
                                                        <div class="col-lg-5 col-md-6 <?php echo(form_error('po_box_city') != '' ? 'has-error' : '');?>">
                                                            <input class="form-control" type="text" name="po_box_city"  value="<?php echo (isset($agency) ? $agency->po_box_city: set_value('po_box_city'));?>" />
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
                                                            <input class="form-control" type="text" name="po_zip1"  value="<?php echo (isset($agency) ? $agency->po_zip1: set_value('po_zip1'));?>" />
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

                            <div id="tab-2" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-2') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <strong>Donec quam felis</strong>
                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>

                            <div id="tab-3" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-3') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Agency user List</h5>
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
                                            <div class="table table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-single-agency-user">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>User Email</th>
                                                        <th>Status</th>
                                                        <th>Profile</th>
                                                        <th>Discipline</th>
                                                        <th>Phone</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($agency->user_agency) and $agency->user_agency != FALSE) {
                                                        foreach ($agency->user_agency as $user_agency) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $user_agency->us_agy_id; ?></td>
                                                                <td><a href="<?php echo current_url() . '/edit/' . $user_agency->us_agy_id;?>"><?php echo($user_agency->users != FALSE ? $user_agency->users->last_name .', ' . $user_agency->users->first_name: ''); ?></a></td>
                                                                <td><?php echo($user_agency->users != FALSE ? $user_agency->users->user_email : ''); ?></td>
                                                                <td><?php echo $user_agency->tab_021_user_status->tab_description; ?></td>
                                                                <td><?php echo $user_agency->profile->profile_name; ?></td>
                                                                <td><?php echo $user_agency->discipline->description; ?></td>
                                                                <td><?php echo($user_agency->users != FALSE ? $user_agency->users->phone_home : ''); ?></td>
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
                            <div id="contractors" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'contractors') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <div class="col-sm-3">
                                                <h5>Agency Contractor List</h5>
                                            </div>

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

                                            <div class="table table-responsive">
                                                <div class="col-sm-6">
                                                    <form action="<?php echo current_url() . '/add-contractor';?>" method="POST" class="form-inline" id="contractorForm">
                                                        <div class="form-group">
                                                            <!--                                                <label for="" class="control-label">Select Contractor</label>-->
                                                            <select class="form-control" name="contractor" id="contractorField">
                                                                <option value="">Select Contractor</option>
                                                                <?php if (isset($new_contractors) and $new_contractors != false) {
                                                                    foreach ($new_contractors as $contr) {
                                                                        ?>
                                                                        <option value="<?php echo $contr->agency_id;?>"><?php echo $contr->agency_name;?></option>
                                                                    <?php
                                                                    }
                                                                }else {
                                                                    ?>
                                                                    <option value="">Not found</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <button class="btn btn-primary">Add Contractor</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover dataTables-agency-contractor">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($contractors) and $contractors != FALSE) {
                                                        foreach ($contractors as $contractor) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $contractor->agency_contractor_id; ?></td>
                                                                <td><?php echo $contractor->agency->agency_name; ?></td>
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

                            <div id="doctors" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'doctors') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Agency Doctor List</h5>

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
                                            <div class="table table-responsive">
                                                <div class="col-sm-7">
                                                    <div class="col-sm-4">
                                                        <!--                                            <button type="button" class="btn btn-primary" id="doctorAddBtn">Add Doctor To Agency type-2</button>-->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doctorFormModal">
                                                            Add doctor to agency
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <form action="<?php echo current_url() . '/add-doctor';?>" method="POST" class="form-inline hide" id="doctorForm">
                                                            <div class="form-group">
                                                                <select class="form-control" multiple="multiple" id="selectDoctor" name="doctor[]">
                                                                    <?php if (isset($new_doctors) and $new_doctors != false) {
                                                                        foreach ($new_doctors as $dtr) {
                                                                            ?>
                                                                            <option value="<?php echo $dtr->agency_id;?>"><?php echo $dtr->agency_name;?></option>
                                                                        <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <button class="btn btn-primary">Add</button>
                                                                <button class="btn btn-white" id="DtrCancelBtn" type="button">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover dataTables-agency-doctor">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Description</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($doctors) and $doctors != FALSE) {
                                                        foreach ($doctors as $doctor) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $doctor->agency_doctor_office_id; ?></td>
                                                                <td><?php echo $doctor->agency->agency_name; ?></td>
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

                            <div id="comments" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'comments') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Comments</h5>
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
                                            <div class="table table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-agency-comment">
                                                    <thead>
                                                    <tr>
                                                        <th>Comments</th>
                                                        <th>Creation Date</th>
                                                        <th>Review Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($comments) and $comments != FALSE) {
                                                        foreach ($comments as $comment) {
                                                            ?>
                                                            <tr id="comment-<?php echo $comment->agy_agency_comments_id;?>">
                                                                <td><?php echo $comment->comment; ?></td>
                                                                <td><?php echo date('m-d-Y', strtotime($comment->created_at)); ?></td>
                                                                <td><?php echo date('m-d-Y', strtotime($comment->review_date)); ?></td>
                                                                <td class="center">
                                                                    <div  class="btn-group btn-group-xs" role="group">
                                                                        <a class="btn btn-info" href="#" onclick="editComment(event,<?php echo $comment->agy_agency_comments_id;?>)">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <a class="btn btn-danger" onclick="deleteComment(event,this,<?php echo $comment->agy_agency_comments_id;?>);" href="<?php echo current_url() . '/comment/delete/' . $comment->agy_agency_comments_id;?>">
                                                                            <i class="fa fa-trash-o"></i>
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
                            <!--Patients tab-->
                            <div id="patients" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'patients') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Patients</h5>
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
                                            <div class="table table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-agency-patient  ">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($patients) and $patients != FALSE) {
                                                        foreach ($patients as $patient) {
                                                            ?>
                                                            <tr id="patient-<?php echo $patient->patient_id;?>">
                                                                <td><?php echo $patient->patient_id;?></td>
                                                                <td><?php echo $patient->first_name; ?></td>
                                                                <td><?php echo $patient->last_name; ?></td>
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

                             <!--Visit Log tab-->
                            <div id="visitLog" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'visitLog') ? 'active' : '');?>">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Comments</h5>
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
                                            <div class="table table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-agency-visit-log">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Visit date</th>
                                                        <th>Visit Type</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Patient</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (isset($visit_logs) and $visit_logs != FALSE) {
                                                        foreach ($visit_logs as $log) {
                                                            if ($log != false) {
                                                                $data = (array)$this->us1_user->where(['user_id' => $log->visit_user_id])->get();
                                                                $first_name = (isset($data['first_name']) ? $data['first_name'] : '');
                                                                $last_name = (isset($data['last_name']) ? $data['last_name'] : '');
                                                                $status = $this->tab_parameter->where(['tab_value' => $log->visit_status_id, 'tab_type' => 83])->get();
                                                                ?>
                                                                <tr id="visit-log-<?php echo $log->visit_log_id; ?>">
                                                                    <td><?php echo $log->visit_log_id; ?></td>
                                                                    <td><?php echo date('m-d-Y', strtotime($log->visit_date_time)); ?></td>
                                                                    <td><?php echo ((isset($log->visit_type) and $log->visit_type != null) ? $log->visit_type->visit_description : ''); ?></td>
                                                                    <td><?php echo $first_name . ' ' . $last_name;?></td>
                                                                    <td><?php echo $status->tab_description; ?></td>
                                                                    <td><?php echo((isset($log->patient) and $log->patient != null) ? $log->patient->last_name . ' ' . $log->patient->first_name : ''); ?></td>
                                                                </tr>
                                                            <?php
                                                            }
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <?php
                if (isset($crnt_agy_usr)) {
                    echo '<h4 class="modal-title">Edit User</h4>';
                }else{
                    echo '<h4 class="modal-title">Add New User</h4>';
                }
                ?>

                <small>You can add user to agency.</small>
            </div>
            <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                <div class="modal-body">
                    <div
                        class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : ''); ?>">
                        <label class="control-label col-lg-2 col-md-3 required">First Name</label>
                        <div class="col-lg-4 col-md-8">
                            <input class="form-control" type="text" name="first_name"
                                   id="first_name"                                    value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->first_name : set_value('first_name')); ?>"
                                   required/>
                            <!--                                                --><?php //echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                        </div>

                        <label class="control-label col-lg-2 col-md-3">Last Name</label>

                        <div class="col-lg-4 col-md-8">
                            <input class="form-control" type="text" name="last_name"
                                   id="last_name"                                    value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->last_name : set_value('last_name')); ?>"/>
                            <!--                                                --><?php //echo form_error('last_name', '<div class="">', '</div>'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="control-label col-lg-2 col-md-3">Middle Name</label>

                        <div class="col-lg-4 col-md-8">
                            <input class="form-control" type="text" name="middle_name"
                                   id="middle_name"                                    value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->middle_initial : set_value('middle_initial')); ?>"/>
                            <!--                                                --><?php //echo form_error('middle_name', '<div class="">', '</div>'); ?>
                        </div>

                        <label class="control-label col-lg-2 col-md-3 required">Email</label>

                        <div
                            class="col-lg-4 col-md-8 <?php echo(form_error('email') != '' ? 'has-error' : ''); ?>">
                            <input class="form-control" type="email" name="email" id="email"
                                                                      value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->user_email : set_value('email')); ?>" <?php echo(isset($crnt_agy_usr) ? 'disabled' : ''); ?>/>
                            <!--                                                --><?php //echo form_error('email', '<div class="">', '</div>'); ?>
                        </div>

                    </div>

                    <div class="form-group " id="data_3">
                        <label class="control-label col-lg-2 col-md-3">Phone</label>

                        <div
                            class="col-lg-4 col-md-8 <?php echo(form_error('phone') != '' ? 'has-error' : ''); ?>"
                            id="data_phone">
                            <input type="text" class="form-control" data-mask="(999) 999-9999"
                                   name="phone" id="phone"
                                   value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->phone_home : set_value('phone')); ?>">
                            <span class="help-block">(999) 999-9999</span>
                            <!--                                                --><?php //echo form_error('phone', '<div class="help-block">', '</div>'); ?>
                        </div>

                        <label class="control-label col-lg-2 col-md-3">Date of birth</label>

                        <div
                            class="col-lg-4 col-md-8 <?php echo(form_error('dob') != '' ? 'has-error' : ''); ?>">
                            <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control"
                                       value="<?php echo (isset($crnt_agy_usr)) ? date('m-d-Y', strtotime($crnt_agy_usr->date_birth)) : ((set_value('dob') != "") ? set_value('dob') : '01-01-1990'); ?>"
                                       name="dob" id="dob">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2 col-md-3 required">Status</label>
                        <div class="col-lg-4 col-md-8 <?php echo(form_error('status') != '' ? 'has-error' : '');?>">
                            <select class="form-control" name="status" <?php set_select('status');?>>
                                <option value="" selected disabled>Select</option>
                                <?php
                                if (isset($user_status) and $user_status != FALSE) {
                                    foreach ($user_status as $status) {
                                        ?>
                                        <option
                                            value="<?php echo $status->tab_value;?>"
                                            <?php echo((isset($crnt_agy_usr) && $crnt_agy_usr->tab_021_user_status == $status->tab_value) ? 'selected' : '');
                                            echo set_select('status', $status->tab_value);?> >
                                            <?php echo $status->tab_description;?>
                                        </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                            <!--                                                --><?php //echo form_error('status', '<div class="help-block">', '</div>'); ?>
                        </div>


                        <label class="control-label col-lg-2 col-md-3 required">Profile</label>
                        <div class="col-lg-4 col-md-8 <?php echo(form_error('profile') != '' ? 'has-error' : '');?>">
                            <select class="form-control" name="profile" <?php set_select('profile');?>>
                                <option value="" selected disabled>Select</option>
                                <?php
                                if (isset($profile) and $profile != FALSE) {
                                    foreach ($profile as $prfl) {
                                        ?>
                                        <option
                                            value="<?php echo $prfl->profile_id;?>"
                                            <?php echo((isset($crnt_agy_usr) && $crnt_agy_usr->profile_id == $prfl->profile_id) ? 'selected' : '');
                                            echo set_select('profile', $prfl->profile_id);?>>
                                            <?php echo $prfl->profile_name;?>
                                        </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                            <!--                                                --><?php //echo form_error('profile', '<div class="help-block">', '</div>'); ?>
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2 col-md-3 required">Discipline</label>
                        <div class="col-lg-4 col-md-8 <?php echo(form_error('discipline') != '' ? 'has-error' : '');?>">
                            <select class="form-control" name="discipline" <?php set_select('discipline');?>>

                                <option value="" selected disabled>Select</option>
                                <?php
                                if (isset($discipline) and $discipline != FALSE) {
                                    foreach ($discipline as $dspln) {
                                        ?>
                                        <option
                                            value="<?php echo $dspln->discipline_id;?>" <?php echo((isset($crnt_agy_usr) && $crnt_agy_usr->discipline_id == $dspln->discipline_id) ? 'selected' : '');
                                        echo set_select('discipline', $dspln->discipline_id);?>>
                                            <?php echo $dspln->description;?>
                                        </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                            <!--                                                --><?php //echo form_error('discipline', '<div class="help-block">', '</div>'); ?>
                        </div>

                        <label class="control-label col-lg-2 col-md-3 required">Employee type</label>
                        <div class="col-lg-4 col-md-8 <?php echo(form_error('employee_type') != '' ? 'has-error' : '');?>">
                            <select class="form-control" name="employee_type" <?php set_select('employee_type');?>>
                                <option value="" selected disabled>Select</option>
                                <?php
                                if (isset($employee_type) and $employee_type != FALSE) {
                                    foreach ($employee_type as $emp_type) {
                                        ?>
                                        <option value="<?php echo $emp_type->tab_value;?>" <?php echo((isset($crnt_agy_usr) && $crnt_agy_usr->tab_006_employee_type == $emp_type->tab_value) ? 'selected' : '');
                                        echo set_select('employee_type', $emp_type->tab_value);?>>
                                            <?php echo $emp_type->tab_description;?>
                                        </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                            <!--                                                --><?php //echo form_error('employee_type', '<div class="help-block">', '</div>'); ?>
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

                    <a <?php echo(isset($crnt_agy_usr) ? 'href="'.site_url('agency/' . $agency->agency_id).'?tab=tab-3"' : 'data-dismiss="modal"');?> class="btn btn-white">Close</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal inmodal" id="doctorFormModal" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add New Doctor To Agency</h4>
                <small>You can select doctors.</small>
            </div>

                <div class="modal-body">
    <!--                <form action="--><?php //echo current_url() . '/add-doctor';?><!--" method="POST" class="form-horizontal" id="doctorForm" onsubmit="addDoctor(event,this)">-->
                    <form action="<?php echo current_url() . '/add-doctor';?>" method="POST" class="form-horizontal" id="doctorForm">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <div class="checkbox checkbox-primary">
                                    <input id="selectall" type="checkbox" >
                                    <label for="selectall">
                                        Select All
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="search" title="Type in a name" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">Select</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                        <div id="list">
                            <ul class="doctor-list list-group">
                            <?php
                            if (isset($new_doctors) and $new_doctors != false) {
                                foreach ($new_doctors as $dtr) {
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox">
                                            <input name="doctor[]" type="checkbox" value="<?php echo $dtr->agency_id;?>" class="cus-check" id="chdoctor">
                                            <label>
                                                    <?php echo $dtr->agency_name;?>
                                            </label>
                                        </div>
                                    </li>
                                <?php
                                }
                            }?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<script>
    $('#search').bind('keyup', function(){
        var searchString = $(this).val();

        $(".list-group li").each(function(index, value) {

            currentName = $(value).text()
            if( currentName.toUpperCase().indexOf(searchString.toUpperCase()) > -1) {
                $(value).show();
            } else {
                $(value).hide();
            }

        });

    });

    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        /*$("#selectall").change(function() {
            if(this.checked) {
                $('doctor').prop('checked', true);
            }
        });*/

        $("#selectall").change(function(){  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.cus-check').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.cus-check').change(function(){ //".checkbox" change
            console.log('kjnk');
            console.log(this);
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){ //if this item is unchecked
                $("#selectall")[0].checked = false; //change "select all" checked status to false
            }

            //check "select all" if all checkbox items are checked
            if ($('.cus-check:checked').length == $('.cus-check').length ){
                $("#selectall")[0].checked = true; //change "select all" checked status to true
            }
        });
    });
</script>
