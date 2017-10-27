<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset password</title>

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

                <h2 class="font-bold">Reset password</h2>

                <p>
                    Enter your New Password below..
                </p>
                <?php echo $message; ?>

                <div class="row">

                    <div class="col-lg-12">
                        <form class="m-t" role="form" method="POST" action="<?php echo site_url('reset-password/' . $code); ?>">
                            <div class="form-group">
                                <?php echo form_input($new_password);?>
                                <small class="text-danger">
                                    Must be <?php echo $min_length . '-' . $max_length;?> characters long.
                                </small>
                            </div>
                            <div class="form-group">
                                <?php echo form_input($new_password_confirm);?>
                            </div>
                            <?php echo form_input($user_id);?>
                            <?php echo form_hidden($csrf); ?>

                            <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
