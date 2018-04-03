<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Heat tickets</h2>
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
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-user-heat-ticket">
                            <thead>
                            <tr>
                                <th>Subject</th>
                                <th>content</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Sent On</th>
                                <th>Last Activity</th>
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
                                        <td><a href="<?php echo site_url(uri_string() . '/' . $value->ticket_id);?>"><?php echo $value->ticket_subject; ?></a></td>
<!--                                    category    <td>--><?php //echo $this->utility->get_tab_value(88, $value->tab_088_ticket_type_id)->tab_description;?><!--</td>-->
                                        <td style="white-space: pre-wrap; word-wrap: break-word;"><?php echo $value->ticket_content;?></td>
                                        <td><?php echo ($status != false ? $status->tab_description : '');?></td>
                                        <td><?php echo(isset($value->user) ? $value->user->last_name . ' ' . $value->user->first_name : ''); ?></td>
                                        <td><?php echo $value->ticket_datetime; ?></td>
                                        <td><?php echo 'last activity'; ?></td>
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
<div class="modal inmodal" id="ticketModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <?php
                if (isset($current_agency)) { ?>
                    <h4 class="modal-title">Edit  Agency</h4>
                    <small>Edit the given agency.</small>
                <?php }else{ ?>
                    <h4 class="modal-title">Create Agency</h4>
                    <small>Create a new agency.</small>
                <?php }
                ?>

            </div>
            <form action="<?php echo site_url(uri_string().'/add')?>" class="form-horizontal" method="post" id="ticketForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ">
                        <label class="control-label col-lg-3 required">Category</label>
                        <div class="col-lg-6 <?php echo(form_error('category') != '' ? 'has-error' : '');?>">
                            <select name="category" id="category" class="form-control <?php echo set_select('agency_type');?>" required="">
                                <option value="" selected disabled>Select</option>
                                <?php
                                if (isset($categories) and $categories != false) {
                                    foreach ($categories as $category) {
                                        ?>
                                        ?>
                                        <option
                                            value="<?php echo $category->tab_value;?>">
                                            <?php echo $category->tab_description;?>
                                        </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 required">Subject</label>
                        <div class="col-lg-6 <?php echo(form_error('subject') != '' ? 'has-error' : '');?>">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject" value="<?php echo (isset($current_agency) ? $current_agency->subject: set_value('subject'));?>" required=""/>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 required">Message</label>
                        <div class="col-lg-6 <?php echo(form_error('message') != '' ? 'has-error' : '');?>">
                            <textarea name="message" id="message" class="form-control" required=""><?php echo (isset($current_agency) ? $current_agency->contact_name: set_value('contact_name'));?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3 required">Attachment</label>
                        <div class="col-lg-6">
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                </div>
                            <span class="input-group-addon btn btn-default btn-file">
                                <span class="fileinput-new">Select file</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="attachment"/>
                            </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div id="errorBlock"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('#ticketForm').submit(function(e) {
            e.preventDefault();

            $.loadingBlockShow({
                imgPath: '../assets/img/default.svg',
//            text: 'Please wait',
                style: {
                    position: 'fixed',
                    width: '100%',
                    height: '100%',
                    background: 'rgba(0, 0, 0, .8)',
                    left: 0,
                    top: 0,
                    zIndex: 100000
                }
            });
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData
            })

                .done(function (response) {
                    $('#ticketForm')[0].reset();
                    $('#ticketModal').modal('toggle');
                    var t = $('.dataTables-user-heat-ticket').DataTable();
                    t.row.add([
                        '<a href="' + document.URL + '/' + response.ticket_id + '">' + response.ticket_subject + '</a>',
                        response.ticket_content,
                        response.tab_089_ticket_status_id,
                        response.ticket_user_id,
                        response.ticket_datetime,
                        'last activity',
                    ]).draw(false);

                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('Successfully Added');
                    }, 330);
                })
                .fail(function (response) {
                    if(response.statusText=='validation error'){
                        var html = '<div class="alert alert-danger "><ul>';
                        var errors=response.responseJSON;
                        $.each(errors, function (i, item) {
                            html += '<li>' + item + '</li>';
                        });
                        html += '</ul></div>';

                        $('#errorBlock').html(html);

//                        if(response.responseJSON.category != undefined){
//                            $('#nameError',form).html(response.responseJSON.name[0]);
//                        }
                    }

                })
                .always(function () {
                    $.loadingBlockHide();
                });


        })
    });
    $('#test').on('click', function(){



//        setTimeout($.loadingBlockHide, 5000);

    })
</script>