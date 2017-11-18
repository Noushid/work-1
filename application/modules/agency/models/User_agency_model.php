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
        $this->has_one['user'] = array('foreign_model' => 'Us1_user_model', 'foreign_table' => 'us1_users', 'foreign_key' => 'user_id', 'local_key' => 'user_id');
        $this->has_one['agency'] = array('foreign_model' => 'User_agency_model', 'foreign_table' => 'us_agy', 'foreign_key' => 'agency_id', 'local_key' => 'agency_id');
        $this->has_one['user_group'] = array('foreign_model' => 'User_group_model', 'foreign_table' => 'xx_users_groups', 'foreign_key' => 'us_agy_id', 'local_key' => 'us_agy_id');
        $this->has_one['profile'] = array('foreign_model' => 'Profile_model', 'foreign_table' => 'x_profile', 'foreign_key' => 'profile_id', 'local_key' => 'profile_id');
        $this->timestamps = FALSE;
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
                    $tab_021_user_status = $this->tab_parameter->where('tab_type', 21)->where('tab_value',$ag_usr->tab_021_user_status)->get();
                    $discipline = $this->discipline->where('discipline_id', $ag_usr->discipline_id)->get();

                    $ag_usr->discipline = $discipline;
                    $ag_usr->profile = $profile;
                    $ag_usr->users = $user;
                    $ag_usr->tab_021_user_status = $tab_021_user_status;
                }
                $agency->user_agency = $agency_user;
            }
        }
        return $agency;
    }


}