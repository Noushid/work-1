<?php
$sub_menu = $this->sub_menu->with_menu()->get_all();
$menu = $this->menu->get_all();
?>
<div class="container">
    <div class="row">
        <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
            <div class="form-group <?php echo(form_error('title') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">First Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="title" placeholder="Title" value="<?php echo (isset($current_menu) ? $current_menu->title : set_value('title'));?>"/>
                    <?php echo form_error('title', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('link') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">last Name</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="link" placeholder="Link" value="<?php echo (isset($current_menu) ? $current_menu->link : '');?>"/>
                    <?php echo form_error('link', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('icon') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Email</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="icon" placeholder="fa-example" value="<?php echo (isset($current_menu) ? $current_menu->icon : '');?>"/>
                    <?php echo form_error('icon', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('description') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Phone</label>
                <div class="col-lg-4">
                    <input class="form-control" type="text" name="description" placeholder="description" value="<?php echo (isset($current_menu) ? $current_menu->icon : '');?>"/>
                    <?php echo form_error('description', '<div class="">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group <?php echo(form_error('description') != '' ? 'has-error' : '');?>">
                <label class="control-label col-lg-2">Sub Menu</label>
                <div class="col-lg-4">
                    <select name="menu" class="form-control" value="<?php echo set_value('menu');?>" required="">
                        <option value="" selected>Select</option>
                        <?php
                        if (isset($menu) and $menu != FALSE) {
                            foreach ($menu as $value) {
                                ?>
                                <option value="<?php echo $value->id?>" <?php echo(isset($current_menu) ? 'selected' : '')?>><?php echo $value->title;?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
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
                <th>Title</th>
                <th>Main Menu</th>
                <th>Link</th>
                <th>Icon</th>
                <th>Description</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($sub_menu) and $sub_menu != FALSE) {
                $i = 1;
                foreach ($sub_menu as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->title; ?></td>
                        <td><?php echo (isset($value->menu) ? $value->menu->title : ''); ?></td>
                        <td><?php echo $value->link; ?></td>
                        <td><?php echo $value->icon; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->created_at; ?></td>
                        <td>
                            <div  class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-info" href="<?php echo site_url('sub-menu/edit/' . $value->id);?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('do you want to delete?');" href="<?php echo site_url('sub-menu/delete/' . $value->id);?>">
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