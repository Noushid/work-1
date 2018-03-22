<?php $user = $this->ion_auth->user()->row();?>
<li class="nav-header">
<div class="dropdown profile-element"> <span>
    <img alt="image" class="img-circle" src="<?php echo asset('img/profile_small.jpg'); ?>" />
        </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <?php
        if (!$this->ion_auth->is_admin()) {
            $agency_name = $this->agency->where('agency_id', $_SESSION['agency']->agency_id)->get()->agency_name;
            echo '<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">' . $agency_name . '</strong>';
        }

        if ($user->tab_005_user_type == 5) {
            $tab_value=$this->tab_parameter->where('tab_type',5)->where('tab_value',4)->get();
        }
//        $tab_value = $this->tab_parameter->where('tab_type', 5)->where('tab_value', 4)->get();
        if (!$this->ion_auth->is_admin()) {
            echo '<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">' . $_SESSION['profile_name'] . '</strong>';
        }
        ?>

        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo (isset($tab_value) ? $tab_value->tab_description :'');?></strong>
        </span> <span class="text-muted text-xs block"><?php echo $user->first_name . ' ' . $user->last_name;?><b class="caret"></b></span> </span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs" id="my-profile-nav">
        <li><a href="<?php echo site_url('my-profile#tab-profile')?>">My Profile</a></li>
        <li><a onclick="location.reload();" href="<?php echo site_url('my-profile#tab-change-password');?>">Change Password</a></li>
        <li><a onclick="location.reload();" href="<?php echo site_url('my-profile#tab-electronic-signature');?>">Electronic Signature</a></li>
        <li><a onclick="location.reload();" href="<?php echo site_url('my-profile#tab-credential');?>">My Credential</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
    </ul>
</div>
<div class="logo-element">
    IN+
</div>
</li>
<?php
echo render_menu($current);
?>
