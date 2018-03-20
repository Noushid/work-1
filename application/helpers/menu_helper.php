<?php
/**
 * menu_helper.php
 * User: Noushid
 * Date: 27/10/17
 * Time: 10:25 PM
 */

/**
* Create render menu function
 * @param current_menu
 * @return string
*/
if (!function_exists('render_menu')) {
    function render_menu($current = "")
    {
//        $group_id = $_SESSION['group_id'];
        $CI = get_instance();
        $CI->load->model('home/Menu_model', 'menu');
        $CI->load->model('home/Menu_model', 'menu');
        $CI->load->model('home/Group_model', 'group');
        $CI->load->model('home/Group_model', 'group');
        $CI->load->model('profile/X_profile_group_model', 'profile_group');
        $CI->load->model('profile/X_profile_group_applic_model', 'profile_group_applica');

        /*Get profile_group with profile_id(profiled_id get from session ,the value added from Auth)*/
        $profile_group = $CI->profile_group->where('profile_id', $_SESSION['profile_id'])->with_group()->get_all();

        /**
         * New Menu System
         * each profile group has main menu and associated applications has their sub menu.
         */
        /*Check user is admin or public user */
        if ($CI->ion_auth->user()->row()->tab_005_user_type == 4) {
            //admin menu part
            $html = '<li  ' . ($current == 'agency' ? 'class="active"' : '') . ' >
                        <a href="' . site_url('agency') . '"><i class="fa fa-list"></i> <span class="nav-label">Agency list</span></a>
                    </li>
                    <li  ' . ($current == 'users' ? 'class="active"' : '') . ' >
                        <a href="' . site_url('users') . '"><i class="fa fa-group"></i> <span class="nav-label">User list</span></a>
                    </li>
                    <li  ' . ($current == 'profile' ? 'class="active"' : '') . ' >
                        <a href="' . site_url('profile') . '"><i class="fa fa-user"></i> <span class="nav-label">Profile</span></a>
                    </li>
                    ';
        }else {
            $html = '';
            if (isset($profile_group) and $profile_group != FALSE) {
                foreach ($profile_group as $prf_grp) {
                    /*get applications with profile_group_id*/
                    $applications = $CI->profile_group_applica->where('profile_group_id', $prf_grp->profile_group_id)->with_x_application()->get_all();
                    $html .= '<li class="" >
                                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">' . $prf_grp->group->group_name . '</span> <span class="fa arrow"></span></a>';
                    if ($applications != false) {
                        $html .= '<ul class="nav nav-second-level">';
                        foreach ($applications as $apl) {
                            $html .= '<li><a href="' . site_url($apl->x_application->application_path) . '">' . $apl->x_application->application_name . '</a></li>';
                        }
                        $html .= '</ul>
                            </li>';

                    }
                }
            }
        }


        /*OLD MENU SYSTEM
         * if ($group_name == 'admin') {
            $html = '<li>
                        <a href="' . site_url('users') . '"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span> <span class="label label-primary pull-right">NEW</span></a>
                    </li>
            <li ' . (is_int(array_search($current, ['users', 'main menu', 'sub menu', 'user menu','groups'])) ? 'class="active"' : '') . '>
                    <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Groups and menu</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ' . ($current == 'x-profile' ? 'class="active"' : '') . ' ><a href="' . site_url('x-profile') . '">X-profile</a></li>
                            <li ' . ($current == 'groups' ? 'class="active"' : '') . ' ><a href="' . site_url('group') . '">Groups</a></li>
                            <li ' . ($current == 'users' ? 'class="active"' : '') . ' ><a href="' . site_url('users') . '">Users</a></li>
                            <li ' . ($current == 'main menu' ? 'class="active"' : '') . ' ><a href="' . site_url('menu') . '">Main Menu</a></li>
                            <li ' . ($current == 'sub menu' ? 'class="active"' : '') . ' ><a href="' . site_url('sub-menu') . '">Sub Menu</a></li>
                            <li ' . ($current == 'user menu' ? 'class="active"' : '') . ' ><a href="' . site_url('user-menu') . '">User menu</a></li>
                        </ul>
                    </li>';
//                <li '. ($current == 'groups' ? 'class="active"' : '') .'>
//                    <a href="' . site_url('group') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Groups</span></a>
//                </li>
//                '<li '. ($current == 'users' ? 'class="active"' : '') .'>
//                    <a href="' . site_url('users') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Users</span></a>
//                </li>
//                '<li '. ($current == 'main menu' ? 'class="active"' : '') .'>
//                    <a href="' . site_url('menu') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Main Menu</span></a>
//                </li>
//                <li '. ($current == 'sub menu' ? 'class="active"' : '') .'>
//                    <a href="' . site_url('sub-menu') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Sub Menu</span></a>
//                </li>
//                <li '. ($current == 'user menu' ? 'class="active"' : '') .'>
//                    <a href="' . site_url('user-menu') . '"><i class="fa fa-th-large"></i> <span class="nav-label">User Menu</span></a>
//                </li>';
        }
        if (isset($menu->menu) and $menu->menu != FALSE) {
            $i = 1;
            foreach ($menu->menu as $main) {
                if ($main->sub_menu == false) {
                    $html .= '<li ' . ($current == $main->title ? 'class="active"' : '') . '>
                        <a href="' . site_url($main->link) . '"><i class="fa ' . $main->icon . '"></i> <span class="nav-label">' . $main->title . '</span></a>
                    </li>';
                }else{
                    $html .= '<li ' . (array_search($current, array_column((array)$main->sub_menu, 'title')) ? 'class="active"' : '') . '>
                    <a href="' . $main->link . '"><i class="fa fa-th-large"></i> <span class="nav-label">' . $main->title . '</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">';
                    foreach ($main->sub_menu as $sub_menu) {
                        $html .= '<li ' . $current . ($current == $sub_menu->title ? 'class="active"' : '') . '><a href="' . $sub_menu->link . '">' . $sub_menu->title . '</a></li>';
                    }
                    $html .= '</ul>
                </li>';
                }

            }
        }*/
        return $html;
    }
}