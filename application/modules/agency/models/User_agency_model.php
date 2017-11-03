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
        $agency = $this->agency->where($where)->get();
        if ($agency) {
            $agency_user = $this->user_agency->where('agency_id', $agency->agency_id)->get_all();
            if ($agency_user) {
                foreach ($agency_user as $ag_usr) {
                    $user = $this->us1_user->where('user_id', $ag_usr->user_id)->get();
                    $profile = $this->profile->where('profile_id', $ag_usr->profile_id)->get();
                    $ag_usr->profile = $profile;
                    $ag_usr->users = $user;
                }
                $agency->user_agency = $agency_user;
            }
        }
        return $agency;
    }


}