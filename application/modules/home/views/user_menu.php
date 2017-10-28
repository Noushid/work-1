<?php
$last = $this->uri->total_segments();
$record_num = (int)$this->uri->segment($last);
?>
<div class="col-md-12">
    <div class="row">
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
    <div class="row">
        <form action="<?php echo site_url(uri_string())?>" class="form-inline" method="post">
            <?php
            if (isset($menu) and $menu != FALSE) {
                ?>
                <div class="col-xs-6">
                    <h3 class="text-center">All Groups</h3>

                    <div class="well" style="max-height: 500px;overflow: auto;">
                        <ul class="list-group checked-list-box">
                            <?php foreach ($menu as $value) { ?>
                                <li class="list-group-item">
                                    <input type="checkbox" class="checkbox" name="menu[]" value="<?php echo $value->id?>" <?php echo(in_array($value->id,$current_perm) ? 'checked' : '')?> />
                                    <?php echo $value->title?>
                                </li>
                            <?php
                            } ?>
                        </ul>
                        <button class="btn btn-primary col-xs-12" id="get-checked-data" value="submit" name="submit">Submit</button>
                    </div>
                </div>
            <?php
            } ?>
        </form>
    </div>
</div>
