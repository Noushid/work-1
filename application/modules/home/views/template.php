<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo (isset($title)?$title:"Title goes here"); ?></title>


    <link href="<?php echo asset('css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset('font-awesome/css/font-awesome.css');?>" rel="stylesheet">

    <link href="<?php echo asset('css/plugins/dataTables/datatables.min.css');?>" rel="stylesheet">

    <link href="<?php echo asset('css/animate.css" rel="stylesheet');?>">
    <link href="<?php echo asset('css/style.css');?>" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo asset('css/plugins/toastr/toastr.min.css'); ?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo asset('js/plugins/gritter/jquery.gritter.css'); ?>" rel="stylesheet">

    <link href="<?php echo asset('css/modified.css'); ?>" rel="stylesheet">

    <!-- Data Tables -->
    <link href="<?php echo asset('css/plugins/dataTables/datatables.min.css');?>" rel="stylesheet">


    <!--Date Picker-->
    <link href="<?php echo asset('css/plugins/datapicker/datepicker3.css');?>" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="<?php echo asset('css/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet">

    <link href="<?php echo asset('css/plugins/iCheck/custom.css');?>" rel="stylesheet">

    <link href="<?php echo asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');?>" rel="stylesheet">

<!--    <link href="--><?php //echo asset('css/plugins/dropzone/basic.css');?><!--" rel="stylesheet">-->

    <link href="<?php echo asset('css/plugins/jasny/jasny-bootstrap.min.css');?>" rel="stylesheet">


    <link href="<?php echo asset('css/plugins/dualListbox/bootstrap-duallistbox.min.css');?>" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="<?php echo asset('js/jquery-3.1.1.min.js');?>"></script>
    <script src="<?php echo asset('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo asset('js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script src="<?php echo asset('js/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>


    <!-- Flot -->
    <script src="<?php echo asset('js/plugins/flot/jquery.flot.js'); ?>"></script>
    <script src="<?php echo asset('js/plugins/flot/jquery.flot.tooltip.min.js'); ?>"></script>
    <script src="<?php echo asset('js/plugins/flot/jquery.flot.spline.js'); ?>"></script>
    <script src="<?php echo asset('js/plugins/flot/jquery.flot.resize.js'); ?>"></script>
    <script src="<?php echo asset('js/plugins/flot/jquery.flot.pie.js'); ?>"></script>

    <!-- Peity -->
    <script src="<?php echo asset('js/plugins/peity/jquery.peity.min.js'); ?>"></script>
    <script src="<?php echo asset('js/demo/peity-demo.js'); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo asset('js/inspinia.js');?>"></script>
    <script src="<?php echo asset('js/plugins/pace/pace.min.js');?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo asset('js/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

    <!-- Toastr -->
    <script src="<?php echo asset('js/plugins/toastr/toastr.min.js'); ?>"></script>

    <!-- Data Tables -->
    <script src="<?php echo asset('js/plugins/dataTables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo asset('js/plugins/dataTables/datatables.min.js');?>"></script>

    <!-- Input Mask-->
    <script src="<?php echo asset('js/plugins/jasny/jasny-bootstrap.min.js');?>"></script>

    <!-- Data picker -->
    <script src="<?php echo asset('js/plugins/datapicker/bootstrap-datepicker.js');?>"></script>

    <!-- Sweet alert -->
    <script src="<?php echo asset('js/plugins/sweetalert/sweetalert.min.js');?>"></script>

    <!-- I check -->
    <script src="<?php echo asset('js/plugins/iCheck/icheck.min.js');?>"></script>

    <!-- Custom -->
    <script src="<?php echo asset('js/custom.js');?>"></script>

    <script src="<?php echo asset('js/plugins/fullcalendar/moment.min.js');?>"></script>

    <script>

        <?php if(isset($_SESSION['message']) or isset($_SESSION['error'])){ ?>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                <?php echo(isset($_SESSION['message']) ? "toastr.success('".$_SESSION['message']."');" : "toastr.error('".$_SESSION['error']."');");?>

            }, 330);
        });
        <?php
        }
        ?>
    </script>




</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <?php $this->load->view('includes/main-navigations'); ?>
            </ul>

        </div>
    </nav>
    <!--        <div id="page-wrapper" class="gray-bg dashbard-1 main-display">-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome <?php echo profile('first_name'); ?></span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>.
                                        <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>.
                                        <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>.
                                        <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo site_url('logout'); ?>">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="">
            <!-- Content Start -->
            <?php $this->load->view($page); ?>
            <!--Content End -->
        </div>

        <!--Confirmation modal start -->
        <div class="modal fade" id="delConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Do you want to delete this?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a href="#" id="delConfirmBtn" class="btn btn-danger"><i class="icon-trash"></i> Delete</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--Confirmation modal start -->

        <div class="footer fixed">
            <div class="footer-group">
                <div class="pull-right">10GB of <strong>250GB</strong> Free.</div>
                <div><strong>Copyright</strong> Example Company &copy; 2014-2017</div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-example').dataTable({
            responsive: true,
            destroy: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });
    });

</script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>



</body>
</html>