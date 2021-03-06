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

    <!-- Custom -->
    <script src="<?php echo asset('js/custom.js');?>"></script>

    <script>
        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }

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
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="<?php echo asset('img/profile_small.jpg'); ?>" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo profile('first_name'); ?></strong></span></span>
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo (isset($profile_name) ? $profile_name : '');?></strong></span></span>
<!--                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">--><?php //echo (isset($user) ? $user->first_name.' '.$user->last_name : '');?><!--</strong></span></span>-->
                            </span> <span class="text-muted text-xs block"><?php echo (isset($user) ? $user->first_name.' '.$user->last_name : '');?><b class="caret"></b></span> </span>
<!--                            <span class="text-muted text-xs block">first and last name<b class="caret"></b></span>-->
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs" id="my-profile-nav">
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-profile');?>">My Profile</a></li>
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-change-password');?>">Change Password</a></li>
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-electronic-signature');?>">Electronic Signature</a></li>
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-credential');?>">My Credential</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:close_window();">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
<!--                <li>-->
<!--                    <a href="--><?php //echo current_url();?><!--"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span> <span class="label label-primary pull-right">NEW</span></a>-->
<!--                </li>-->

                <?php
                if (isset($profile_group) and $profile_group != FALSE) {
                    foreach ($profile_group as $prf_grp) {
                        /*get applications with profile_group_id*/
                        $applications = $this->profile_group_applica->where('profile_group_id', $prf_grp->profile_group_id)->with_x_application()->get_all(); ?>
                        <li class="" >
                                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo $prf_grp->group->group_name;?></span> <span class="fa arrow"></span></a>
                            <?php if ($applications != false) { ?>
                            <ul class="nav nav-second-level">
                            <?php foreach ($applications as $apl) { ?>
                                <li><a href="<?php echo current_url() . '/' . $apl->x_application->application_name;?>">
                                        <?php echo $apl->x_application->application_name;?></a></li>
                            <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <?php
                        }
                    }
                }
               ?>

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
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="m-r-sm text-muted welcome-message text-xs block" style="font-weight: 400;">Welcome <?php echo profile('first_name') . '  ' . profile('last_name'); ?><b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs" id="my-profile-nav">
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-profile');?>">My Profile</a></li>
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-change-password');?>">Change Password</a></li>
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-electronic-signature');?>">Electronic Signature</a></li>
                            <li><a href="<?php echo site_url('user-dash/' . $user_id . '/my-profile#tab-credential');?>">My Credential</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:close_window();">Logout</a></li>
                        </ul>
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
    function close_window() {
        window.close();
    }

    $(document).ready(function() {
        $('.dataTables-example').dataTable({
            responsive: true,
            destroy: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        /* Init DataTables */
        var oTable = $('#editable').dataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable( '../example_ajax.php', {
            "callback": function( sValue, y ) {
                var aPos = oTable.fnGetPosition( this );
                oTable.fnUpdate( sValue, aPos[0], aPos[1] );
            },
            "submitdata": function ( value, settings ) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition( this )[2]
                };
            },

            "width": "90%",
            "height": "100%"
        } );


    });

</script>

</body>
</html>