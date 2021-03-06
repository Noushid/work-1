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
                    <?php
                    $flash = $this->session->flashdata('flash');
                    if($flash != ""):
                    ?>
                        <p class="alert alert-<?php echo $flash['type']; ?>">
                        <?php echo $flash['message']; ?>
                        </p>
                    <?php endif; ?>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="POST" action="<?php echo site_url('forgot-password'); ?>">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
