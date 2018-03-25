<?php
/**
 * My_Form_validation.php
 * User: Noushid P
 * Date: 19/1/18
 */
class Utility {


    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('agency/Tab_parameter_model', 'tab_parameter', TRUE);
    }

    public function get_tab_value($type,$value="") {
        if ($value != "") {
            return $this->CI->tab_parameter->where('tab_type', $type)->where('tab_value', $value)->get();
        }
        return $this->CI->tab_parameter->where('tab_type', $type)->get_all();
    }

}