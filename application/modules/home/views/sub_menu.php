<?php
$sub_menu = $this->sub_menu->with_menu()->get_all();
$menu = $this->menu->get_all();
if (isset($modal_opened) and $modal_opened == true) {
    ?>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#myModal4').modal('show');
        });
    </script>
<?php
}
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sub menu</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>Sub menu</strong>
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
                    <h5>List All Sub Menu</h5>
                </div>
                <div class="ibox-content">
                    <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Create Sub menu</h4>
                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group <?php echo(form_error('title') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Title</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="title" placeholder="Title" value="<?php echo (isset($current_menu) ? $current_menu->title : set_value('title'));?>"/>
                                                <?php echo form_error('title', '<div class="help-block">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('link') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Link</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="link" placeholder="Link" value="<?php echo (isset($current_menu) ? $current_menu->link : '');?>"/>
                                                <?php echo form_error('link', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('icon') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Icon</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="icon" placeholder="fa-example" value="<?php echo (isset($current_menu) ? $current_menu->icon : '');?>"/>
                                                <?php echo form_error('icon', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('description') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Description</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="description" placeholder="description" value="<?php echo (isset($current_menu) ? $current_menu->icon : '');?>"/>
                                                <?php echo form_error('description', '<div class="">', '</div>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo(form_error('menu') != '' ? 'has-error' : '');?>">
                                            <label class="control-label col-lg-2">Main Menu</label>
                                            <div class="col-lg-8">
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
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('sub-menu')?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-sub-menu">
                            <thead>
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
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

