<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>User List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>patients</strong>
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
                    <h5>List All Patients</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-user-patient ">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Phone</th>
                                <th>SOC Date</th>
                                <th>Agency Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($patients) and $patients != FALSE) {
                                foreach ($patients as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->patient_id; ?></td>
                                        <td><?php echo $value->last_name; ?></td>
                                        <td><?php echo $value->first_name; ?></td>
                                        <td><?php echo $value->phone_cell; ?></td>
                                        <td><?php echo $value->phone_cell; ?></td>
                                        <td><?php echo $value->phone_cell; ?></td>
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
