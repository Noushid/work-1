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
        $CI = get_instance();
        $CI->load->model('home/Menu_model', 'menu');
        $menu = $CI->menu->with_subMenu()->get_all();
        $html = '<li '. ($current == 'dashboard' ? 'class="active"' : '') .'>
                    <a href="' . site_url() . '"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li '. ($current == 'groups' ? 'class="active"' : '') .'>
                    <a href="' . site_url('group') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Groups</span></a>
                </li>
                <li '. ($current == 'users' ? 'class="active"' : '') .'>
                    <a href="' . site_url('users') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Users</span></a>
                </li>
                <li '. ($current == 'main menu' ? 'class="active"' : '') .'>
                    <a href="' . site_url('menu') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Main Menu</span></a>
                </li>
                <li '. ($current == 'sub menu' ? 'class="active"' : '') .'>
                    <a href="' . site_url('sub-menu') . '"><i class="fa fa-th-large"></i> <span class="nav-label">Sub Menu</span></a>
                </li>';
        if (isset($menu) and $menu != FALSE) {
            $i = 1;
            foreach ($menu as $main) {
                if ($main->subMenu == null) {
                    $html .= '<li ' . ($current == $main->title ? 'class="active' : '') . '>
                        <a href="' . site_url($main->link) . '"><i class="fa ' . $main->title . '"></i> <span class="nav-label">' . $main->title . '</span></a>
                    </li>';
                }else{
                    $html .= '<li>
                    <a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu' . $i . '" aria-expanded="false"><i class="fa ' . $main->icon . '"></i> <span class="nav-label">' . $main->title . '</span></a>
                    <ul class="nav collapse" id="submenu' . $i . '" role="menu" aria-labelledby="btn-1">';
                    foreach ($main->subMenu as $sub_menu) {
                        $html .= '<li><a href="' . $sub_menu->link . '">' . $sub_menu->title . '</a></li>';
                    }
                    $html .= '</ul>
                </li>';
                }

            }
        }
        return $html;
    }
}