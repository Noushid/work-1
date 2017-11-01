<?php
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
        <h2>Basic Form</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>group</strong>
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
                    <h5>List All Groups</h5>
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
                    <div class="">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">
                            Add a new group
                        </button>
                    </div>

                    <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Modal title</h4>
                                    <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                </div>
                                <form action="<?php echo site_url(uri_string())?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                            <div class="form-group <?php echo(form_error('name') != '' ? 'has-error' : '');?>">
                                                <label class="control-label col-lg-2">Name</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" type="text" name="name" placeholder="Group Name" value="<?php echo(isset($current_group) ? $current_group->name : set_value('name'));?>" required/>
                                                    <?php echo form_error('name', '<div class="help-block">', '</div>'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group <?php echo(form_error('description') != '' ? 'has-error' : '');?>">
                                                <label class="control-label col-lg-2">Description</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" type="text" name="description" placeholder="Description" value="<?php echo (isset($current_group) ? $current_group->description: '');?>"/>
                                                    <?php echo form_error('description', '<div class="">', '</div>'); ?>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('group')?>" class="btn btn-white">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
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
