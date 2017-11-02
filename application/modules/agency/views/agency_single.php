<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Basic Form</h2>
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

<div class="row">
    <div class="col-lg-12">
        <div class="panel blank-panel">

            <div class="panel-heading">
                <div class="panel-title m-b-md"><h4>Agency Details</h4></div>
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

                    <div id="tab-3" class="tab-pane">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Add a new Users
                                    </button>
                                </div>

                                <div class="col-md-7">
                                    <h4>Agency Users</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>last Name</th>
                                <th>Status</th>
                                <th>Profile</th>
                                <th>Discipline</th>
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
                                        <td><a href="<?php echo site_url('agency/show/' . $agency->agency_id);?>"><?php echo $agency->agency_name; ?></a></td>
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