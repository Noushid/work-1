<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Basic Form</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Forms</a>
            </li>
            <li class="active">
                <strong>Basic Form</strong>
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
                    <h5>Users <small>Add user</small></h5>
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
                    <div class="row">
                        <div class="col-sm-12 b-r">
                            <h3 class="m-t-none m-b">Create User</h3>
                            <form action="<?php echo (isset($current_group) ? site_url(uri_string()) : site_url('group/add'))?>" class="form-horizontal" method="post">
                                <div class="form-group <?php echo(form_error('first_name') != '' ? 'has-error' : '');?>">
                                    <label class="control-label col-lg-2">First Name</label>
                                    <div class="col-lg-4">
                                        <input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo(isset($current_user) ? $current_user->first_name : set_value('first_name'));?>" required=""/>
                                        <?php echo form_error('first_name', '<div class="help-block">', '</div>'); ?>
                                    </div>

                                    <label class="control-label col-lg-2">Last Name</label>
                                    <div class="col-lg-4">
                                        <input class="form-control" type="text" name="last_name" placeholder="Last name" value="<?php echo (isset($current_user) ? $current_user->last_name: set_value('last_name'));?>" required=""/>
                                        <?php echo form_error('last_name', '<div class="">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group <?php echo(form_error('email') != '' ? 'has-error' : '');?>">
                                    <label class="control-label col-lg-2">Email</label>
                                    <div class="col-lg-4">
                                        <input class="form-control" type="email" name="email" placeholder="<?php echo (isset($current_user) ? $current_user->email: 'Email');?>" value="<?php echo set_value('email');?>" <?php echo (isset($current_user) ? '': 'required');?>/>
                                        <?php echo form_error('email', '<div class="">', '</div>'); ?>
                                    </div>

                                    <label class="control-label col-lg-2">Phone</label>
                                    <div class="col-lg-4">
                                        <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="<?php echo (isset($current_user) ? $current_user->phone : set_value('phone'));?>"/>
                                        <?php echo form_error('phone', '<div class="">', '</div>'); ?>
                                    </div>

                                </div>
                                <div class="form-group <?php echo(form_error('group') != '' ? 'has-error' : '');?>">
                                    <label class="control-label col-lg-2">Group</label>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="group">
                                            <option value="" selected disabled>Select</option>
                                            <?php
                                            if ($groups != FALSE) {
                                                foreach ($groups as $group) {
                                                    ?>
                                                    <option
                                                        value="<?php echo $group->id;?>"
                                                        <?php echo (!empty($current_user->groups) ? ($group->id == $current_user->groups[0]->id ? 'selected' : '') : '')?> >
                                                        <?php echo $group->name;?>
                                                    </option>
                                                <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                        <?php echo form_error('username', '<div class="">', '</div>'); ?>
                                    </div>
                                    <?php
                                    if (!isset($current_user)) {
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Password</label>

                                            <div class="col-lg-4">
                                                <div class="help-block">
                                                    Default password is "password"
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>


                                <?php
                                if (isset($current_user)) {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label col-lg-1">Reset Password</label>

                                        <div class="col-lg-5">
                                            <input type="checkbox" name="reset_password" value="1"/>
                                            <div class="help-block">If Tick Password changed to "password"</div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <div class="col-lg-8 text-center">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                        <a class="btn btn-danger" href="<?php echo site_url('users');?>">Reset</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-sm-12">
                            list users here
                            <div class="">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($groups) and $groups != FALSE) {
                                        $i = 1;
                                        foreach ($groups as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->description; ?></td>
                                                <td class="center">
                                                    <div  class="btn-group btn-group-xs" role="group">
                                                        <a class="btn btn-info" href="<?php echo site_url('group/edit/' . $value->id);?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo site_url('group/delete/' . $value->id);?>">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Groups <small>Add groups</small></h5>
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
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">Create group</h3>
                            <form action="<?php echo (isset($current_group) ? site_url(uri_string()) : site_url('group/add'))?>" class="form-horizontal" method="post">
                                <div class="form-group <?php echo(form_error('name') != '' ? 'has-error' : '');?>">
                                    <label class="control-label col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" name="name" placeholder="Group Name" value="<?php echo(isset($current_group) ? $current_group->name : set_value('name'));?>" required=""/>
                                        <?php echo form_error('name', '<div class="help-block">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group <?php echo(form_error('description') != '' ? 'has-error' : '');?>">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" name="description" placeholder="Description" value="<?php echo (isset($current_group) ? $current_group->description: '');?>"/>
                                        <?php echo form_error('description', '<div class="">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12 text-center">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        <a class="btn btn-danger" href="<?php echo site_url();?>">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($groups) and $groups != FALSE) {
                                        $i = 1;
                                        foreach ($groups as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->description; ?></td>
                                                <td class="center">
                                                    <div  class="btn-group btn-group-xs" role="group">
                                                        <a class="btn btn-info" href="<?php echo site_url('group/edit/' . $value->id);?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo site_url('group/delete/' . $value->id);?>">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
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
    </div>

<!--<div class="row">-->
<!--    <div class="col-lg-8">-->
<!--        <div class="ibox float-e-margins">-->
<!--            <div class="ibox-title">-->
<!--                <h5>Inline form</h5>-->
<!--                <div class="ibox-tools">-->
<!--                    <a class="collapse-link">-->
<!--                        <i class="fa fa-chevron-up"></i>-->
<!--                    </a>-->
<!--                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                        <i class="fa fa-wrench"></i>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu dropdown-user">-->
<!--                        <li><a href="#">Config option 1</a>-->
<!--                        </li>-->
<!--                        <li><a href="#">Config option 2</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <a class="close-link">-->
<!--                        <i class="fa fa-times"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="ibox-content">-->
<!--                <form role="form" class="form-inline">-->
<!--                    <div class="form-group"><label for="exampleInputEmail2" class="sr-only">Email address</label>-->
<!--                        <input type="email" placeholder="Enter email" id="exampleInputEmail2" class="form-control"></div>-->
<!--                    <div class="form-group"><label for="exampleInputPassword2" class="sr-only">Password</label>-->
<!--                        <input type="password" placeholder="Password" id="exampleInputPassword2" class="form-control"></div>-->
<!--                    <div class="checkbox m-l m-r-xs"><label class="i-checks"> <input type="checkbox"><i></i> Remember me </label></div>-->
<!--                    <button class="btn btn-white" type="submit">Sign in</button></form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-lg-4">-->
<!--        <div class="ibox float-e-margins">-->
<!--            <div class="ibox-title">-->
<!--                <h5>Modal form <small>Example of login in modal box</small></h5>-->
<!--                <div class="ibox-tools">-->
<!--                    <a class="collapse-link">-->
<!--                        <i class="fa fa-chevron-up"></i>-->
<!--                    </a>-->
<!--                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--                        <i class="fa fa-wrench"></i>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu dropdown-user">-->
<!--                        <li><a href="#">Config option 1</a>-->
<!--                        </li>-->
<!--                        <li><a href="#">Config option 2</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <a class="close-link">-->
<!--                        <i class="fa fa-times"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="ibox-content">-->
<!--                <div class="text-center">-->
<!--                    <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Form in simple modal box</a>-->
<!--                </div>-->
<!--                <div id="modal-form" class="modal fade" aria-hidden="true">-->
<!--                    <div class="modal-dialog">-->
<!--                        <div class="modal-content">-->
<!--                            <div class="modal-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Sign in</h3>-->
<!---->
<!--                                        <p>Sign in today for more expirience.</p>-->
<!---->
<!--                                        <form role="form">-->
<!--                                            <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter email" class="form-control"></div>-->
<!--                                            <div class="form-group"><label>Password</label> <input type="password" placeholder="Password" class="form-control"></div>-->
<!--                                            <div>-->
<!--                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log in</strong></button>-->
<!--                                                <label> <input type="checkbox" class="i-checks"> Remember me </label>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                    <div class="col-sm-6"><h4>Not a member?</h4>-->
<!--                                        <p>You can create an account:</p>-->
<!--                                        <p class="text-center">-->
<!--                                            <a href=""><i class="fa fa-sign-in big-icon"></i></a>-->
<!--                                        </p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-12">-->
<!--<div class="ibox float-e-margins">-->
<!--<div class="ibox-title">-->
<!--    <h5>All form elements <small>With custom checbox and radion elements.</small></h5>-->
<!--    <div class="ibox-tools">-->
<!--        <a class="collapse-link">-->
<!--            <i class="fa fa-chevron-up"></i>-->
<!--        </a>-->
<!--        <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
<!--            <i class="fa fa-wrench"></i>-->
<!--        </a>-->
<!--        <ul class="dropdown-menu dropdown-user">-->
<!--            <li><a href="#">Config option 1</a>-->
<!--            </li>-->
<!--            <li><a href="#">Config option 2</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <a class="close-link">-->
<!--            <i class="fa fa-times"></i>-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="ibox-content">-->
<!--<form method="get" class="form-horizontal">-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Normal</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="text" class="form-control"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Help text</label>-->
<!--    <div class="col-sm-10"><input type="text" class="form-control"> <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Password</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Placeholder</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-lg-2 control-label">Disabled</label>-->
<!---->
<!--    <div class="col-lg-10"><input type="text" disabled="" placeholder="Disabled input here..." class="form-control"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-lg-2 control-label">Static control</label>-->
<!---->
<!--    <div class="col-lg-10"><p class="form-control-static">email@example.com</p></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Checkboxes and radios <br/>-->
<!--        <small class="text-navy">Normal Bootstrap elements</small></label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="checkbox"><label> <input type="checkbox" value=""> Option one is this and that&mdash;be sure to include why it's great </label></div>-->
<!--        <div class="radio"><label> <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Option one is this and that&mdash;be sure to-->
<!--                include why it's great </label></div>-->
<!--        <div class="radio"><label> <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Option two can be something else and selecting it will-->
<!--                deselect option one </label></div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Inline checkboxes</label>-->
<!---->
<!--    <div class="col-sm-10"><label class="checkbox-inline"> <input type="checkbox" value="option1" id="inlineCheckbox1"> a </label> <label class="checkbox-inline">-->
<!--            <input type="checkbox" value="option2" id="inlineCheckbox2"> b </label> <label class="checkbox-inline">-->
<!--            <input type="checkbox" value="option3" id="inlineCheckbox3"> c </label></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Checkboxes &amp; radios <br/><small class="text-navy">Custom elements</small></label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="checkbox i-checks"><label> <input type="checkbox" value=""> <i></i> Option one </label></div>-->
<!--        <div class="checkbox i-checks"><label> <input type="checkbox" value="" checked=""> <i></i> Option two checked </label></div>-->
<!--        <div class="checkbox i-checks"><label> <input type="checkbox" value="" disabled="" checked=""> <i></i> Option three checked and disabled </label></div>-->
<!--        <div class="checkbox i-checks"><label> <input type="checkbox" value="" disabled=""> <i></i> Option four disabled </label></div>-->
<!--        <div class="radio i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Option one </label></div>-->
<!--        <div class="radio i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Option two checked </label></div>-->
<!--        <div class="radio i-checks"><label> <input type="radio" disabled="" checked="" value="option2"> <i></i> Option three checked and disabled </label></div>-->
<!--        <div class="radio i-checks"><label> <input type="radio" disabled="" name="a"> <i></i> Option four disabled </label></div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Inline checkboxes</label>-->
<!---->
<!--    <div class="col-sm-10"><label class="checkbox-inline i-checks"> <input type="checkbox" value="option1">a </label>-->
<!--        <label class="checkbox-inline i-checks"> <input type="checkbox" value="option2"> b </label>-->
<!--        <label class="checkbox-inline i-checks"> <input type="checkbox" value="option3"> c </label></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Select</label>-->
<!---->
<!--    <div class="col-sm-10"><select class="form-control m-b" name="account">-->
<!--            <option>option 1</option>-->
<!--            <option>option 2</option>-->
<!--            <option>option 3</option>-->
<!--            <option>option 4</option>-->
<!--        </select>-->
<!---->
<!--        <div class="col-lg-4 m-l-n"><select class="form-control" multiple="">-->
<!--                <option>option 1</option>-->
<!--                <option>option 2</option>-->
<!--                <option>option 3</option>-->
<!--                <option>option 4</option>-->
<!--            </select></div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group has-success"><label class="col-sm-2 control-label">Input with success</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="text" class="form-control"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group has-warning"><label class="col-sm-2 control-label">Input with warning</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="text" class="form-control"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group has-error"><label class="col-sm-2 control-label">Input with error</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="text" class="form-control"></div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Control sizing</label>-->
<!---->
<!--    <div class="col-sm-10"><input type="text" placeholder=".input-lg" class="form-control input-lg m-b">-->
<!--        <input type="text" placeholder="Default input" class="form-control m-b"> <input type="text" placeholder=".input-sm" class="form-control input-sm">-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Column sizing</label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="row">-->
<!--            <div class="col-md-2"><input type="text" placeholder=".col-md-2" class="form-control"></div>-->
<!--            <div class="col-md-3"><input type="text" placeholder=".col-md-3" class="form-control"></div>-->
<!--            <div class="col-md-4"><input type="text" placeholder=".col-md-4" class="form-control"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Input groups</label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="input-group m-b"><span class="input-group-addon">@</span> <input type="text" placeholder="Username" class="form-control"></div>-->
<!--        <div class="input-group m-b"><input type="text" class="form-control"> <span class="input-group-addon">.00</span></div>-->
<!--        <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="text" class="form-control"> <span class="input-group-addon">.00</span></div>-->
<!--        <div class="input-group m-b"><span class="input-group-addon"> <input type="checkbox"> </span> <input type="text" class="form-control"></div>-->
<!--        <div class="input-group"><span class="input-group-addon"> <input type="radio"> </span> <input type="text" class="form-control"></div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Button addons</label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="input-group m-b"><span class="input-group-btn">-->
<!--                                            <button type="button" class="btn btn-primary">Go!</button> </span> <input type="text" class="form-control">-->
<!--        </div>-->
<!--        <div class="input-group"><input type="text" class="form-control"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">Go!-->
<!--                </button> </span></div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">With dropdowns</label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="input-group m-b">-->
<!--            <div class="input-group-btn">-->
<!--                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">Action <span class="caret"></span></button>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li><a href="#">Action</a></li>-->
<!--                    <li><a href="#">Another action</a></li>-->
<!--                    <li><a href="#">Something else here</a></li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li><a href="#">Separated link</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <input type="text" class="form-control"></div>-->
<!--        <div class="input-group"><input type="text" class="form-control">-->
<!---->
<!--            <div class="input-group-btn">-->
<!--                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">Action <span class="caret"></span></button>-->
<!--                <ul class="dropdown-menu pull-right">-->
<!--                    <li><a href="#">Action</a></li>-->
<!--                    <li><a href="#">Another action</a></li>-->
<!--                    <li><a href="#">Something else here</a></li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li><a href="#">Separated link</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group"><label class="col-sm-2 control-label">Segmented</label>-->
<!---->
<!--    <div class="col-sm-10">-->
<!--        <div class="input-group m-b">-->
<!--            <div class="input-group-btn">-->
<!--                <button tabindex="-1" class="btn btn-white" type="button">Action</button>-->
<!--                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li><a href="#">Action</a></li>-->
<!--                    <li><a href="#">Another action</a></li>-->
<!--                    <li><a href="#">Something else here</a></li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li><a href="#">Separated link</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <input type="text" class="form-control"></div>-->
<!--        <div class="input-group"><input type="text" class="form-control">-->
<!---->
<!--            <div class="input-group-btn">-->
<!--                <button tabindex="-1" class="btn btn-white" type="button">Action</button>-->
<!--                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>-->
<!--                <ul class="dropdown-menu pull-right">-->
<!--                    <li><a href="#">Action</a></li>-->
<!--                    <li><a href="#">Another action</a></li>-->
<!--                    <li><a href="#">Something else here</a></li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li><a href="#">Separated link</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="hr-line-dashed"></div>-->
<!--<div class="form-group">-->
<!--    <div class="col-sm-4 col-sm-offset-2">-->
<!--        <button class="btn btn-white" type="submit">Cancel</button>-->
<!--        <button class="btn btn-primary" type="submit">Save changes</button>-->
<!--    </div>-->
<!--</div>-->
<!--</form>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
</div>