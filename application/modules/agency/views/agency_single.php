<?php //var_dump($agency);
//exit

?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $agency->agency_name;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
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

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Agency Details</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Agency Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3">Agency Users</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>

                        <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When.</p>
                    </div>

                    <div id="tab-2" class="tab-pane">
                        <strong>Donec quam felis</strong>

                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>

                    </div>

                    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">New Agency user</h4>
                                    <small>You can add user to agency.</small>
                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">

                                        <div class="form-group ">
                                            <label class="control-label col-lg-2">Select User</label>
                                            <div class="col-lg-4 <?php echo(form_error('user') != '' ? 'has-error' : '');?>">
                                                <select class="form-control" name="user" required="" <?php set_select('user');?>>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="ddd">user1</option>
                                                    <option value="ddd">user2</option>
                                                    <option value="ddd">user3</option>
                                                </select>
                                                <?php echo form_error('user', '<div class="help-block">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2">Status</label>
                                            <div class="col-lg-4 <?php echo(form_error('status') != '' ? 'has-error' : '');?>">
                                                <select class="form-control" name="status" required="" <?php set_select('status');?>>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="ddd">stats</option>
                                                    <option value="ddd">stats</option>
                                                </select>
                                                <?php echo form_error('status', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <!--                                            <div class="form-group --><?php //echo(form_error('first_name') != '' ? 'has-error' : '');?><!--">-->
                                        <!--                                                <label class="control-label col-lg-2">First Name</label>-->
                                        <!--                                                <div class="col-lg-4">-->
                                        <!--                                                    <input class="form-control" type="text" name="first_name" placeholder="First Name" value="--><?php //echo(isset($current_agy_user) ? $current_agy_user->first_name : set_value('first_name'));?><!--" required/>-->
                                        <!--                                                    --><?php //echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                                        <!--                                                </div>-->
                                        <!---->
                                        <!--                                                <label class="control-label col-lg-2">Last Name</label>-->
                                        <!--                                                <div class="col-lg-4">-->
                                        <!--                                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="--><?php //echo (isset($current_agy_user) ? $current_agy_user->last_name: '');?><!--"/>-->
                                        <!--                                                    --><?php //echo form_error('description', '<div class="">', '</div>'); ?>
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->

                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Profile</label>
                                            <div class="col-lg-4 <?php echo(form_error('profile') != '' ? 'has-error' : '');?>">
                                                <select class="form-control" name="profile" required="" <?php set_select('status');?>>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="ddd">profile</option>
                                                    <option value="ddd">profile</option>
                                                </select>
                                                <?php echo form_error('profile', '<div class="help-block">', '</div>'); ?>
                                            </div>

                                            <label class="control-label col-lg-2">Discipline</label>
                                            <div class="col-lg-4 <?php echo(form_error('discipline') != '' ? 'has-error' : '');?>">
                                                <select class="form-control" name="Discipline" required="" <?php set_select('discipline');?>>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="ddd">discipline</option>
                                                    <option value="ddd">discipline</option>
                                                    <option value="ddd">discipline</option>
                                                </select>
                                                <?php echo form_error('discipline', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="button">Or Add new User</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <a href="<?php echo site_url('agency/show/' . $agency->agency_id);?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="tab-3" class="tab-pane">
                        <div class="ibox">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Add new user to Agency
                            </button>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTables-example">
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
                                        <td><?php echo $user_agency->users->last_name; ?></td>
                                        <td><?php echo $user_agency->users->first_name; ?></td>
                                        <td><?php echo $user_agency->tab_021_user_status->tab_description; ?></td>
                                        <td><?php echo $user_agency->profile->profile_name; ?></td>
                                        <td><?php echo $user_agency->discipline->description; ?></td>
                                        <td><?php echo $user_agency->users->phone_home; ?></td>
                                        <td class="center">
                                            <div  class="btn-group btn-group-xs" role="group">
                                                <a class="btn btn-info" href="<?php echo site_url('agency/edit/' . $user_agency->us_agy_id);?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo site_url('agency/delete/' . $user_agency->us_agy_id);?>">
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