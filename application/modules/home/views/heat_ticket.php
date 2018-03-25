<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>User List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>Heat Ticket</strong>
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
                    <h5>List All Heat Tickets</h5>
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
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-heat-ticket">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Sent On</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($hot_tickets) and $hot_tickets != FALSE) {
                                foreach ($hot_tickets as $value) {
                                    if ($value->tab_089_ticket_status_id != null) {
                                        $status = $this->utility->get_tab_value(89, $value->tab_089_ticket_status_id);
                                    }else{
                                        $status = null;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $value->ticket_id; ?></td>
                                        <td><?php echo $value->ticket_subject; ?></td>
<!--                                        category<td>--><?php //echo $this->utility->get_tab_value(88, $value->tab_088_ticket_type_id)->tab_description;?><!--</td>-->
                                        <td style="white-space: pre-wrap; word-wrap: break-word;"><?php echo $value->ticket_content;?></td>
                                        <td><?php echo ($status != false ? $status->tab_description : '');?></td>
                                        <td><?php echo(isset($value->user) ? $value->user->last_name . ' ' . $value->user->first_name : ''); ?></td>
                                        <td data-sort="<?php echo strtotime($value->ticket_datetime);?>"><?php echo $value->ticket_datetime; ?></td>
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
