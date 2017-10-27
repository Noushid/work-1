<div class="container">
    <div class="row">
        <form action="<?php echo site_url('profile')?>" class="form-horizontal" method="post">
            <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                <label class="control-label col-md-2">First Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="first_name" placeholder="Your First Name" value="<?php echo(set_value('first_name') == '' ? $user->first_name : set_value('first_name'));?>"/>
                    <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                <label class="control-label col-md-2">last Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="last_name" placeholder="Your Last Name" value="<?php echo(set_value('last_name') == '' ? $user->last_name : set_value('last_name'));?>"/>
                    <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                <label class="control-label col-md-2">Email</label>
                <div class="col-lg-4">
                    <input class="form-control" type="email" name="email" placeholder="example@example.com" value="<?php echo(set_value('email') == '' ? $user->email : set_value('email'));?>"/>
                    <?php echo form_error('email', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                <label class="control-label col-md-2">Phone</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="phone" placeholder="Your phone Number" value="<?php echo(set_value('phone') == '' ? $user->phone : set_value('phone'));?>"/>
                    <?php echo form_error('phone', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Password (If Change)</label>
                <div class="col-lg-4">
                    <input class="form-control" type="password" name="password" placeholder="******" pattern="^.{<?php echo $min_length . ',' . $max_length;?>}.*$" />
                    Must be <?php echo $min_length . '-' . $max_length;?> characters long.
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Confirm Password</label>
                <div class="col-lg-4">
                    <input class="form-control" type="password" name="confirm_password" placeholder="******" pattern="^.{<?php echo $min_length . ',' . $max_length;?>}.*$"/>
                </div>
            </div>
            <?php echo form_hidden($csrf); ?>

            <div class="form-group">
                <div class="col-lg-8 text-center">
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>