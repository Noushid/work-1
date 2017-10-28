<?php
/**
 * Group_model.php
 * User: Noushid
 * Date: 28/10/17
 * Time: 12:54 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Group_model extends MY_Model
{

    public $table = 'xx_groups';
    function __construct()
    {
        parent::__construct();
        $this->has_many_pivot['menu'] = [
            'foreign_model' => 'Menu_model',
            'pivot_table' => 'xx_group_menu',
            'local_key' => 'id',
            'pivot_local_key' => 'group_id',
            'pivot_foreign_key' => 'menu_id',
            'foreign_key' => 'id',
            'get_relate' => true
        ];
    }

    public function select()
    {
        $groups = $this->group->get_all();
        if ($groups) {
            foreach ($groups as $group) {
                $group_menu = $this->group_menu->where('group_id', $group->id)->get_all();
                if ($group_menu) {
                    foreach ($group_menu as $grp_mn) {
                        $menu = $this->menu->where('id', $grp_mn->menu_id)->get_all();
                        if ($menu) {
                            foreach ($menu as $mn) {
                                $sub_menu = $this->sub_menu->where('menu_id', $mn->id)->get_all();
                                $mn->sub_menu = $sub_menu;
                            }
                            $group->menu = $menu;
                        }
                    }

                }

            }
            return $groups;
        }
    }

    public function select_where($where)
    {
        $group = $this->group->where($where)->get();
        if ($group) {
//            foreach ($groups as $group) {
                $group_menu = $this->group_menu->where('group_id', $group->id)->get_all();
                if ($group_menu) {
                    $temp = [];
                    foreach ($group_menu as $grp_mn) {
                        $menu = $this->menu->where('id', $grp_mn->menu_id)->get();
                        if ($menu) {
                            $sub_menu = $this->sub_menu->where('menu_id', $menu->id)->get_all();
                            $menu->sub_menu = $sub_menu;
                            $temp[] = $menu;

                        }
                    }
                    $group->menu = $temp;
                }

//            }
            return $group;
        }
    }


}