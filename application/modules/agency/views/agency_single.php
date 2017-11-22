<?php //var_dump($crnt_agy_usr);
//exit

?>

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
    });

</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $agency->agency_name;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('agency');?>">Agency</a>
            </li>
            <li class="active">
                <strong><?php echo $agency->agency_name;?></strong>
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
                        <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-1') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-1">Agency Details</a></li>
                        <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-2') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-2">Agency Settings</a></li>
                        <li class="<?php echo((isset($active_tab) && $active_tab == 'tab-3') ? 'active' : '');?>"><a data-toggle="tab" href="#tab-3">Agency Users</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-1') ? 'active' : '');?>">
                        <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>

                        <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When.</p>
                    </div>

                    <div id="tab-2" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-2') ? 'active' : '');?>">
                        <strong>Donec quam felis</strong>

                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>

                    </div>

                    <div id="tab-3" class="tab-pane <?php echo((isset($active_tab) && $active_tab == 'tab-3') ? 'active' : '');?>">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Agency user List</h5>
                                <div class="ibox-tools">
<!--                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">-->
<!--                                        Add new user to Agency-->
<!--                                    </button>-->
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-striped table-bordered table-hover dataTables-single-agency-user">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>last Name</th>
                                        <th>First Name</th>
                                        <th>Status</th>
                                        <th>Profile</th>
                                        <th>Discipline</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($agency->user_agency) and $agency->user_agency != FALSE) {
                                        $i = 1;
                                        foreach ($agency->user_agency as $user_agency) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $user_agency->us_agy_id; ?></td>
                                                <td><?php echo($user_agency->users != FALSE ? $user_agency->users->last_name : ''); ?></td>
                                                <td><?php echo($user_agency->users != FALSE ? $user_agency->users->first_name : ''); ?></td>
                                                <td><?php echo $user_agency->tab_021_user_status->tab_description; ?></td>
                                                <td><?php echo $user_agency->profile->profile_name; ?></td>
                                                <td><?php echo $user_agency->discipline->description; ?></td>
                                                <td><?php echo($user_agency->users != FALSE ? $user_agency->users->phone_home : ''); ?></td>
                                                <td class="center">
                                                    <div  class="btn-group btn-group-xs" role="group">
                                                        <a class="btn btn-info" href="<?php echo current_url() . '/edit/' . $user_agency->us_agy_id;?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo current_url() . '/delete/' . $user_agency->us_agy_id;?>">
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
<!--                                        <div class="form-group">-->
<!--                                            <label class="control-label col-lg-2">Select User</label>-->
<!--                                            <div class="col-lg-10 --><?php //echo(form_error('user') != '' ? 'has-error' : '');?><!--">-->
<!--                                                <select class="form-control" name="user" --><?php //set_select('user');?><!-- onchange="getUser(this)">-->
<!--                                                    <option value="" selected>Select</option>-->
<!--                                                    --><?php
//                                                    if (isset($users) and $users != FALSE) {
//                                                        foreach ($users as $user) {
//                                                            ?>
<!--                                                            <option value="--><?php //echo $user->user_id;?><!--">--><?php //echo $user->first_name;?><!--</option>-->
<!--                                                        --><?php
//                                                        }
//                                                    }
//                                                    ?>
<!--                                                </select>-->
<!--                                                --><?php //echo form_error('user', '<div class="help-block">', '</div>'); ?>
<!--                                            </div>-->
<!--                                        </div>-->

                                        <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2 required">First Name</label>
                                            <div class="col-lg-4">
                                                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" value="<?php echo(isset($crnt_agy_usr) ? $crnt_agy_usr->first_name : set_value('first_name'));?>" required/>
                                                <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2">Last Name</label>
                                            <div class="col-lg-4">
                                                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo (isset($crnt_agy_usr) ? $crnt_agy_usr->last_name: set_value('last_name'));?>"/>
                                                <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label class="control-label col-lg-2">Middle Name</label>
                                            <div class="col-lg-4">
                                                <input class="form-control" type="text" name="middle_name" id="middle_name" placeholder="Middle name" value="<?php echo (isset($crnt_agy_usr) ? $crnt_agy_usr->middle_initial: set_value('middle_initial'));?>"/>
                                                <?php echo form_error('middle_name', '<div class="">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-4 <?php echo(form_error('email') != '' ? 'has-error' : '');?>">
                                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?php echo (isset($crnt_agy_usr) ? $crnt_agy_usr->user_email: set_value('email'));?>" <?php echo (isset($crnt_agy_usr) ? 'disabled': '');?>/>
                                                <?php echo form_error('email', '<div class="">', '</div>'); ?>
                                            </div>

                                        </div>

                                        <div class="form-group <?php echo(form_error('phone') != '' ? 'has-error' : '');?>" id="data_3">
                                            <label class="control-label col-lg-2">Phone</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Phone home" name="phone" id="phone" value="<?php echo (isset($crnt_agy_usr) ? $crnt_agy_usr->phone_home : set_value('phone'));?>">
                                                <span class="help-block">(999) 999-9999</span>
                                                <?php echo form_error('phone', '<div class="help-block">', '</div>'); ?>
                                            </div>

<!--                                            <label class="control-label col-lg-2">Date Of Birth</label>-->
<!--                                            <div class="col-lg-4">-->
<!--                                                <input class="form-control" type="text" name="dob" id="dob" placeholder="Date Of Birth" value="--><?php //echo (isset($crnt_agy_usr) ? $crnt_agy_usr->date_birth: set_value('dob'));?><!--"/>-->
<!--                                                --><?php //echo form_error('dob', '<div class="">', '</div>'); ?>
<!--                                            </div>-->
                                            <label class="font-noraml col-lg-2">Date of birth</label>
                                            <div class="col-lg-4">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" value="<?php echo(isset($crnt_agy_usr)) ? date('m-d-Y',strtotime($crnt_agy_usr->date_birth)) : ((set_value('dob') != "") ? set_value('dob') : '01-01-1990');?>" name="dob" id="dob" >
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
                                                <?php echo form_error('status', '<div class="help-block">', '</div>'); ?>
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
                                                <?php echo form_error('profile', '<div class="help-block">', '</div>'); ?>
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
                                                <?php echo form_error('discipline', '<div class="help-block">', '</div>'); ?>
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
                                                <?php echo form_error('employee_type', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <a <?php echo(isset($crnt_agy_usr) ? 'href="'.site_url('agency/' . $agency->agency_id).'?tab=tab-3"' : 'data-dismiss="modal"');?> class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
</div>
<script>
    function getUser(e) {
        if (e.value == "") {
//            $('#first_name').val("").prop('disabled', false);
            $('#first_name').val("");
            $('#last_name').val("");
            $('#middle_name').val("");
            $('#email').val("");
            $('#phone').val("");
            $('#dob').val("");
        }else{
            $.get('get-user/' + e.value)
                .done(function (response) {
                    $('#first_name').val(response.first_name);
                    $('#last_name').val(response.last_name);
                    $('#middle_name').val(response.middle_name);
                    $('#email').val(response.user_email);
                    $('#phone').val(response.phone_home);
                    $('#dob').val(response.birth_date);
                })
                .fail(function () {
                    console.log("error");
                });
        }
    }

    $('#data_3 .input-group.date').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });
</script>