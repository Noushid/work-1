<?php $user = $this->ion_auth->user()->row();?>
<li class="nav-header">
<div class="dropdown profile-element"> <span>
    <img alt="image" class="img-circle" src="<?php echo asset('img/profile_small.jpg'); ?>" />
        </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo profile('first_name'); ?></strong>
        <?php
        if ($user->tab_005_user_type == 5) {
            $tab_value=$this->tab_parameter->where('tab_type',5)->where('tab_value',4)->get();
        }
        ?>

        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo (isset($tab_value) ? $tab_value->tab_description :'');?></strong>
        </span> <span class="text-muted text-xs block"><?php echo $user->first_name . ' ' . $user->last_name;?><b class="caret"></b></span> </span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="<?php echo site_url('my-profile')?>">Profile</a></li>
        <li><a href="contacts.html">Contacts</a></li>
        <li><a href="mailbox.html">Mailbox</a></li>
        <li class="divider"></li>
        <li><a href="login.html">Logout</a></li>
    </ul>
</div>
<div class="logo-element">
    IN+
</div>
</li>


<?php
echo render_menu($current);
/*if (isset($menu) and $menu != FALSE) {
    $i = 1;
    foreach ($menu as $main) {
        if ($main->subMenu == null) {
            */?><!--
            <li>
                <a href="<?php /*echo site_url($main->link); */?>"><i class="fa <?php /*echo $main->title;*/?>"></i> <span class="nav-label"><?php /*echo $main->title;*/?></span></a>
            </li>
        <?php
/*        }else{
            echo '<li>
                    <a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu' . $i . '" aria-expanded="false"><i class="fa ' . $main->icon . '"></i> <span class="nav-label">' . $main->title . '</span></a>
                    <ul class="nav collapse" id="submenu' . $i . '" role="menu" aria-labelledby="btn-1">';
            foreach ($main->subMenu as $sub_menu) { */?>
                <li><a href="<?php /*echo $sub_menu->link;*/?>"><?php /*echo $sub_menu->title;*/?></a></li>
        --><?php /*}
            echo '</ul>
                </li>';
        }

    }
}*/ ?>
