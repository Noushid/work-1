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
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $contractor->agency_name;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('contractor');?>">Contractor</a>
            </li>
            <li class="active">
                <strong><?php echo $contractor->agency_name;?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel blank-panel">
            <div class="panel-heading">
                <div class="panel-options">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="<?php echo(!isset($active_tab) ? 'active' :  (isset($active_tab) && $active_tab == 'demographics') ? 'active' : '');?>"><a data-toggle="tab" href="#demographics">Demographics</a></li>
                        <li class="<?php echo((isset($active_tab) && $active_tab == 'users') ? 'active' : '');?>"><a data-toggle="tab" href="#users">Users</a></li>
                        <li class="<?php echo((isset($active_tab) && $active_tab == 'contractors') ? 'active' : '');?>"><a data-toggle="tab" href="#contractors">agencies</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <div class="tab-content">

                    <div id="demographics" class="tab-pane <?php echo(!isset($active_tab) ? 'active' :  (isset($active_tab) && $active_tab == 'demographics') ? 'active' : '');?>">
                        <h3 class="text-center"><?php echo $contractor->agency_name;?></h3>
                        <div class="hr-line-solid"></div>
                        <?php echo form_open(site_url('contractor/edit/' . $contractor->agency_id), ['class' => "form-horizontal"]);?>
                            <fieldset class="the-fieldset m-t-lg">
                                <legend class="the-legend"> <i class="fa fa-caret-right fa-primary"></i> Agency Name</legend>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2 required">Name</label>
                                    <div class="col-lg-4 <?php echo(form_error('agency_name') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="text" name="agency_name" placeholder="Agency Name" value="<?php echo(isset($contractor) ? $contractor->agency_name : set_value('agency_name'));?>" /><!--required=""/>-->
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="the-fieldset m-t-lg" >
                                <legend class="the-legend"> <i class="fa fa-caret-right fa-primary"></i> Type & Status</legend>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 required">Type</label>
                                    <div class="col-lg-4 <?php echo(form_error('agency_type') != '' ? 'has-error' : '');?>">
                                        <input type="hidden" name="agency_type" value="C"/>
                                        <select name="agency_type" class="form-control" <?php echo set_select('agency_type');?> disabled>
                                            <option value="" selected disabled>Select</option>
                                            <option value="A" <?php echo((isset($contractor) && $contractor->agency_type == 'A') ? 'selected' : '');
                                            echo set_select('agency_type', 'A');?>>
                                                Agency
                                            </option>
                                            <option value="C" <?php echo((isset($contractor) && $contractor->agency_type == 'C') ? 'selected' : '');
                                            echo set_select('agency_type', 'C');?>>
                                                Contractor
                                            </option>
                                            <option value="D" <?php echo((isset($contractor) && $contractor->agency_type == 'D') ? 'selected' : '');
                                            echo set_select('agency_type', 'D');?>>
                                                Doctor office
                                            </option>
                                        </select>
                                        <!--                                                --><?php //echo form_error('agency_type', '<div class="">', '</div>'); ?>
                                    </div>
                                    <label class="control-label col-lg-2 required">Status</label>
                                    <div class="col-lg-4 <?php echo(form_error('agency_status') != '' ? 'has-error' : '');?>">
                                        <select name="agency_status" class="form-control" <?php echo set_select('agency_status');?> ><!--required="">-->
                                            <option value="" selected disabled>Select</option>
                                            <option value="Act" <?php echo((isset($contractor) && $contractor ->agency_status == 'Act') ? 'selected' : '');
                                            echo set_select('agency_status', 'Act');?>>Active</option>
                                            <option value="Inact" <?php echo((isset($contractor) && $contractor->agency_status == "Inact") ? 'selected' : '');
                                            echo set_select('agency_status', 'Inact');?>>Inactive</option>
                                            <option value="SA" <?php echo((isset($contractor) && $contractor  ->agency_status == 'SA') ? 'selected' : '');
                                            echo set_select('agency_status', 'SA');?>>Stand-alone</option>
                                        </select>
                                        <!--                                                --><?php //echo form_error('agency_status', '<div class="">', '</div>'); ?>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="the-fieldset m-t-lg">
                                <legend class="the-legend"><i class="fa fa-caret-right fa-primary"></i> Demographics</legend>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Address</label>
                                    <div class="col-lg-4  <?php echo(form_error('address') != '' ? 'has-error' : '');?>">
                                        <textarea name="address" id="address" class="form-control"><?php echo (isset($contractor) ? $contractor->address: set_value('address'));?></textarea>
                                    </div>

                                    <label class="control-label col-lg-2">City</label>
                                    <div class="col-lg-4  <?php echo(form_error('city') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="text" name="city" placeholder="City" value="<?php echo (isset($contractor) ? $contractor->city: set_value('city'));?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2 required">State</label>
                                    <div class="col-lg-4 <?php echo(form_error('state') != '' ? 'has-error' : '');?>">
                                        <select name="state" class="form-control" <?php echo set_select('state');?> ><!--required="">-->
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

                                    <label class="control-label col-lg-2">Zip Code</label>
                                    <div class="col-lg-4  <?php echo(form_error('zipcode') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="text" name="zipcode" placeholder="Zip code" value="<?php echo (isset($contractor) ? $contractor ->zip: set_value('zipcode'));?>" />
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
                                        <input class="form-control" type="text" name="contact_name" placeholder="Contact Name" value="<?php echo (isset($contractor) ? $contractor->contact_name: set_value('contact_name'));?>" /><!--required=""/>-->
                                        <!--                                                --><?php //echo form_error('contact_name', '<div class="">', '</div>'); ?>
                                    </div>

                                    <label class="control-label col-lg-2 required">Contact Phone</label>
                                    <div class="col-lg-4  <?php echo(form_error('contact_phone') != '' ? 'has-error' : '');?>">
                                        <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Contact Phone Number" name="contact_phone" value="<?php echo (isset($contractor) ? $contractor->contact_phone: set_value('contact_phone'));?>" id="phone" />
                                        <span class="help-block">(999) 999-9999</span>
                                        <!--                                                --><?php //echo form_error('contact_phone', '<div class="">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Fax</label>
                                    <div class="col-lg-4  <?php echo(form_error('fax') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="text" name="fax" id="fax" data-mask="99-9999999" placeholder="Fax" value="<?php echo (isset($contractor) ? $contractor  ->fax: set_value('fax'));?>" />
                                    </div>

                                    <label class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-4  <?php echo(form_error('agency_email') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="email" name="agency_email" placeholder="Email" value="<?php echo (isset($contractor) ? $contractor  ->agency_email: set_value('agency_email'));?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Web Address</label>
                                    <div class="col-lg-4  <?php echo(form_error('web_address') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="text" name="web_address" placeholder="Web Address" value="<?php echo (isset($contractor) ? $contractor  ->web_address: set_value('web_address'));?>" /><!--required=""/>-->
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="the-fieldset m-t-lg">
                                <legend class="the-legend"> <i class="fa fa-caret-right fa-primary"></i> PO Box Information</legend>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Address</label>
                                    <div class="col-lg-4  <?php echo(form_error('po_box_address') != '' ? 'has-error' : '');?>">
                                        <textarea name="po_box_address" id="po_box_address" class="form-control"><?php echo (isset($contractor) ? $contractor ->po_box_address: set_value('po_box_address'));?></textarea>
                                    </div>

                                    <label class="control-label col-lg-2">City</label>
                                    <div class="col-lg-4  <?php echo(form_error('po_box_city') != '' ? 'has-error' : '');?>">
                                        <input class="form-control" type="text" name="po_box_city" placeholder="City" value="<?php echo (isset($contractor) ? $contractor ->po_box_city: set_value('po_box_city'));?>" />
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
                                        <input class="form-control" type="text" name="po_zip1"  placeholder="Zip" value="<?php echo (isset($contractor) ? $contractor ->po_zip1: set_value('po_zip1'));?>" />
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
                                <a href="<?php echo site_url(uri_string());?>" class="btn btn-white">Close</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

                    </div>

                    <div id="users" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'users') ? 'active' : '');?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Contractor user List</h5>
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
                                        if (isset($contractor ->user_agency) and $contractor->user_agency != FALSE) {
                                            foreach ($contractor  ->user_agency as $user_agency) {
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
                    <div id="contractors" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'contractors') ? 'active' : '');?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="col-sm-3">
                                    <h5>Agency List</h5>
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
                                    <table class="table table-striped table-bordered table-hover dataTables-contractor-agency">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (isset($agencies) and $agencies != FALSE) {
                                            foreach ($agencies as $agency) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $agency->agency_id; ?></td>
                                                    <td><?php echo $agency->agencies->agency_name; ?></td>
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
        <?php echo form_open(site_url(uri_string()), ['class' => "form-horizontal"]);?>
            <div class="modal-body">
                <div
                    class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : ''); ?>">
                    <label class="control-label col-lg-2 required">First Name</label>

                    <div class="col-lg-4">
                        <input class="form-control" type="text" name="first_name"
                               id="first_name" placeholder="First Name"
                               value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->first_name : set_value('first_name')); ?>"
                               required/>
                        <!--                                                --><?php //echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                    </div>

                    <label class="control-label col-lg-2">Last Name</label>

                    <div class="col-lg-4">
                        <input class="form-control" type="text" name="last_name"
                               id="last_name" placeholder="Last Name"
                               value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->last_name : set_value('last_name')); ?>"/>
                        <!--                                                --><?php //echo form_error('last_name', '<div class="">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-group">

                    <label class="control-label col-lg-2">Middle Name</label>

                    <div class="col-lg-4">
                        <input class="form-control" type="text" name="middle_name"
                               id="middle_name" placeholder="Middle name"
                               value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->middle_initial : set_value('middle_initial')); ?>"/>
                        <!--                                                --><?php //echo form_error('middle_name', '<div class="">', '</div>'); ?>
                    </div>

                    <label class="control-label col-lg-2 required">Email</label>

                    <div
                        class="col-lg-4 <?php echo(form_error('email') != '' ? 'has-error' : ''); ?>">
                        <input class="form-control" type="email" name="email" id="email"
                               placeholder="Email"
                               value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->user_email : set_value('email')); ?>" <?php echo(isset($crnt_agy_usr) ? 'disabled' : ''); ?>/>
                        <!--                                                --><?php //echo form_error('email', '<div class="">', '</div>'); ?>
                    </div>

                </div>

                <div class="form-group " id="data_3">
                    <label class="control-label col-lg-2">Phone</label>

                    <div
                        class="col-lg-4 <?php echo(form_error('phone') != '' ? 'has-error' : ''); ?>"
                        id="data_phone">
                        <input type="text" class="form-control" data-mask="(999) 999-9999"
                               placeholder="Phone home" name="phone" id="phone"
                               value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->phone_home : set_value('phone')); ?>">
                        <span class="help-block">(999) 999-9999</span>
                        <!--                                                --><?php //echo form_error('phone', '<div class="help-block">', '</div>'); ?>
                    </div>

                    <label class="control-label col-lg-2">Date of birth</label>

                    <div
                        class="col-lg-4 <?php echo(form_error('dob') != '' ? 'has-error' : ''); ?>">
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
                    <label class="control-label col-lg-2 required">Status</label>
                    <div class="col-lg-4 <?php echo(form_error('status') != '' ? 'has-error' : '');?>">
                        <select class="form-control" name="status" required="" <?php set_select('status');?> required="">
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


                    <label class="control-label col-lg-2 required">Profile</label>
                    <div class="col-lg-4 <?php echo(form_error('profile') != '' ? 'has-error' : '');?>">
                        <select class="form-control" name="profile" required="" <?php set_select('profile');?> required="">
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
                    <label class="control-label col-lg-2 required">Discipline</label>
                    <div class="col-lg-4 <?php echo(form_error('discipline') != '' ? 'has-error' : '');?>">
                        <select class="form-control" name="discipline" required="" <?php set_select('discipline');?> required="">

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

                    <label class="control-label col-lg-2 required">Employee type</label>
                    <div class="col-lg-4 <?php echo(form_error('employee_type') != '' ? 'has-error' : '');?>">
                        <select class="form-control" name="employee_type" required="" <?php set_select('employee_type');?> required="">
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

                <a <?php echo(isset($crnt_agy_usr) ? 'href="'.site_url('agency/' . $contractor->agency_id).'?tab=users"' : 'data-dismiss="modal"');?> class="btn btn-white">Close</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
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
                            <input type="text" id="search" placeholder="Search for Doctors" title="Type in a name" class="form-control">
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
