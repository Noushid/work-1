<?php $user = $this->ion_auth->user()->row();?>
<li class="nav-header">
<div class="dropdown profile-element"> <span>
    <img alt="image" class="img-circle" src="<?php echo asset('img/profile_small.jpg'); ?>" />
        </span>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo profile('first_name'); ?></strong>
        </span> <span class="text-muted text-xs block"><?php echo (isset($_SESSION['group_name']) ? $_SESSION['group_name'] :'');?><b class="caret"></b></span> </span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a href="<?php echo site_url('profile')?>">Profile</a></li>
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
