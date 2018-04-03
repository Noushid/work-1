<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Heat tickets</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li>
                <a href="<?php echo site_url('help/ticket');?>">Heat Ticket</a>
            </li>
            <li class="active">
                <strong><?php echo $ticket->ticket_subject;?></strong>
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
                    <h5><?php echo($ticket->user->last_name.' '. $ticket->user->last_name);?></h5>
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
                    <h3>Ticket Information</h3>
                    <hr class="hr-line-solid"/>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group clear-list m-t todo-list">
                                <li>
                                    <span class="pull-right">
                                        <?php
                                        if ($ticket->tab_089_ticket_status_id != null) {
                                            echo $this->utility->get_tab_value(89, $ticket->tab_089_ticket_status_id)->tab_description;
                                        }?>
                                    </span>
                                    <strong> Status</strong>
                                </li>
                                <li>
                                    <span class="pull-right">
                                        <?php echo $ticket->ticket_subject;?>
                                    </span>
                                    <strong>Subject</strong>
                                </li>
                                <li>
                                    <span class="pull-right">
                                        <?php echo $ticket->ticket_content;?>
                                    </span>
                                    <strong>Message</strong>
                                </li>
                                <li>
                                    <span class="pull-right">
                                        <a href="<?php echo base_url('uploads/tickets/' . $ticket->attachment);?>" target="_blank"><?php echo $ticket->attachment;?></a>

                                    </span>
                                    <strong>Attachment</strong>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">

                            <ul class="list-group clear-list m-t todo-list ">

                                <li>
                                    <span class="pull-right">
                                        <?php echo $ticket->ticket_datetime;?>
                                    </span>
                                    <strong>sent On</strong>
                                </li>
                                <li>
                                    <span class="pull-right">
                                        <?php echo $this->utility->get_tab_value(88, $ticket->tab_088_ticket_type_id)->tab_description;?>
                                    </span>
                                    <strong>Category</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr class="hr-line-solid"/>
                    <h3>Ticket Replies</h3>
                    <hr class="hr-line-solid"/>
                    <div class="row">
                        <div class="table-response">
                            <table class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Content</th>
                                    <th>Replied On</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($ticket->response) and $ticket->response != null) {
                                        foreach ($ticket->response as $response) {
                                            ?>
                                            <tr>
                                                <td><?php echo $response->user->last_name . ' ' . $response->user->last_name; ?></td>
                                                <td style="word-wrap: break-word;min-width: 33%;max-width: 40%;"><?php echo $response->response_content; ?></td>
                                                <td><?php echo $response->response_datetime; ?></td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!--<div class="col-lg-12">
                            <ul class="list-group clear-list m-t todo-list">
                                <li class="col-lg-6">
                                    <span class="pull-right">
                                        <?php /*echo(($ticket->response != null and isset($ticket->response[0]->user)) ? $ticket->response[0]->user->last_name . ' ' . $ticket->response[0]->user->first_name : '');*/?>
                                    </span>
                                    <strong>User</strong>
                                </li>

                                <li class="col-lg-6">
                                    <span class="pull-right">
                                        <?php /*echo($ticket->response != null ? $ticket->response[0]->response_datetime : '');*/?>
                                    </span>
                                    <strong>Replied On</strong>
                                </li>
                                <li class="col-lg-6">
                                    <strong>Message</strong>
                                    <span class="pull-right">
                                        <?php /*echo($ticket->response != null ? $ticket->response[0]->response_content : '');*/?>
                                    </span>

                                </li>
                            </ul>
                        </div>-->
                    </div>

                    <hr class="hr-line-solid"/>
                    <h3>Reply To this ticket</h3>
                    <hr class="hr-line-solid"/>
                    <br/>
                    <div class="row">
                        <?php echo form_open(site_url(uri_string() . '/reply'), ['class' => "form-horizontal"]);?>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Reply</label>
                            <div class="col-lg-6 <?php echo(form_error('reply') != '' ? 'has-error' : '');?>">
                                <textarea name="reply" id="reply" class="form-control" required=""></textarea>
                                <?php echo form_error('reply', '<div class="help-block">', '</div>'); ?>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-primary">Reply</button>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
