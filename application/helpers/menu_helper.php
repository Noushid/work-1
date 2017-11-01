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
        $group_id = $_SESSION['group_id'];
        $CI = get_instance();
        $CI->load->model('home/Menu_model', 'menu');
        $CI->load->model('home/Group_model', 'group');
        $group_name = $CI->group->where('id', $group_id)->get()->name;
        $menu = $CI->group->select_where(['id' => $group_id]);
        $html = '';
        if ($group_name == 'admin') {
            $html = '<li>
                        <a href="' . site_url('users') . '"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span> <span class="label label-primary pull-right">NEW</span></a>
                    </li>
            <li ' . (array_search($current, ['users', 'main menu', 'sub menu', 'user menu','groups']) >= 0 ? 'class="active"' : '') . '>
                    <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Groups and menu</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
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
                if ($main->sub_menu == null) {
                    $html .= '<li ' . ($current == $main->title ? 'class="active' : '') . '>
                        <a href="' . site_url($main->link) . '"><i class="fa ' . $main->title . '"></i> <span class="nav-label">' . $main->title . '</span></a>
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
        }
        return $html;
    }
}