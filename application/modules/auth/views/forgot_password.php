<!--<h1>--><?php //echo lang('forgot_password_heading');?><!--</h1>-->
<!--<p>--><?php //echo sprintf(lang('forgot_password_subheading'), $identity_label);?><!--</p>-->
<!---->
<!--<div id="infoMessage">--><?php //echo $message;?><!--</div>-->
<!---->
<?php //echo form_open("auth/forgot_password");?>
<!---->
<!--      <p>-->
<!--      	<label for="identity">--><?php //echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?><!--</label> <br />-->
<!--      	--><?php //echo form_input($identity);?>
<!--      </p>-->
<!---->
<!--      <p>--><?php //echo form_submit('submit', lang('forgot_password_submit_btn'));?><!--</p>-->
<!---->
<?php //echo form_close();?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot password</title>

    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

    <link href="<?php echo asset('css/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('css/style.css'); ?>" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="passwordBox animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">

                <h2 class="font-bold">Forgot password</h2>

                <p>
                    Enter your email address and your password will be reset and emailed to you.
                </p>
                <p class="alert alert-<?php echo $message['type']; ?>">
                    <?php echo $message;?>
                </p>

                <div class="row">

                    <div class="col-lg-12">
                        <form class="m-t" role="form" method="POST" action="<?php echo site_url('forgot-password'); ?>">
                            <div class="form-group">
                                <?php echo form_input($identity);?>
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>
<!--                            --><?php //echo form_submit('submit', [lang('forgot_password_submit_btn'), 'class' => 'btn btn-primary block full-width m-b']);?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
