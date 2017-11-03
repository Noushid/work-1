<?php
$last = $this->uri->total_segments();
$record_num = (int)$this->uri->segment($last);
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sub menu</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo site_url();?>">Home</a>
            </li>
            <li class="active">
                <strong>User menu</strong>
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
                <h5>Menu Permission</h5>
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
                        <h3 class="m-t-none m-b">Select User</h3>
                        <p>Select user and assign menu.</p>

                        <div class="form-group">
                            <label for="" class="control-label">Select User</label>
                            <select name="user" id="" class="form-control" onchange="location = this.value;">
                                <option value="" selected>Select</option>
                                <?php
                                if (isset($groups) and $groups != FALSE) {
                                    foreach ($groups as $group) {
                                        ?>
                                        <option
                                            value="<?php echo site_url('user-menu/' . $group->id); ?>"
                                            <?php echo($record_num == $group->id ? 'selected' : '')?>>
                                            <?php echo  $group->name ?>
                                        </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <h4>All Groups</h4>
                        <p>You can tick for menu:</p>
                        <form action="<?php echo site_url(uri_string())?>" class="form-inline" method="post">
                            <?php
                            if (isset($menu) and $menu != FALSE) {
                                ?>
                                <div class="col-xs-10">
                                    <ul class="list-group checked-list-box">
                                        <?php foreach ($menu as $value) { ?>
                                            <li class="list-group-item">
                                                <div class="checkbox i-checks">
                                                    <label> <input type="checkbox" name="menu[]" value="<?php echo $value->id?>" <?php echo(in_array($value->id,$current_perm) ? 'checked' : '')?> >
                                                        <i></i> <?php echo $value->title?>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php
                                        } ?>
                                    </ul>
                                    <button class="btn btn-primary" id="get-checked-data" value="submit" name="submit">Submit</button>
                                    <a class="btn btn-danger" href="<?php echo site_url('user-menu');?>">Cancel</a>
                                </div>
                            <?php
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

