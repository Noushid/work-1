<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">

    <link href="<?php echo asset('css/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('css/style.css'); ?>" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Login Area</h3>
        <p>Login to access administrator section</p>
        <?php echo $message; ?>
        <form class="m-t" role="form" method="POST" action="<?php echo site_url('login'); ?>">
            <div class="form-group">
<!--                --><?php //echo lang('login_identity_label', 'identity');?>
                <?php echo form_input($identity);?>
            </div>
            <div class="form-group">
<!--                --><?php //echo lang('login_password_label', 'password');?>
                <?php echo form_input($password);?>
            </div>
            <div class="form-group">
                <?php echo lang('login_remember_label', 'remember');?>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="<?php echo site_url('forgot-password'); ?>""><small><?php echo lang('login_forgot_password');?></small></a>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo asset('js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>

</body>

</html>
