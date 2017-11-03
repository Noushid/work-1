<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/3/17
 * Time: 1:33 AM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class User_agency_model extends MY_Model
{

    public $table = 'us_agy';
    public $primary_key = 'us_agy_id';
    function __construct()
    {
        parent::__construct();

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