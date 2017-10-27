<div class="container">
    <div class="row">
        <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
            <div class="form-group <?php echo(form_error('title') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="name" placeholder="Group Name" value="<?php echo(isset($current_group) ? $current_group->name : set_value('name'));?>"/>
                    <?php echo form_error('name', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('description') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Description</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="description" placeholder="Description" value="<?php echo (isset($current_group) ? $current_group->description: '');?>"/>
                    <?php echo form_error('description', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-8 text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($users) and $users != FALSE) {
                $i = 1;
                foreach ($users as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->first_name; ?></td>
                        <td><?php echo $value->last_name; ?></td>
                        <td><?php echo $value->username; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td>
                            <?php foreach ($value->groups as $group) { ?>
                                <a href=""><?php echo $group->name;?></a>,
                            <?php
                            }
                        ?>
                        </td>
                        <td>
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
        </table>
    </div>
</div>