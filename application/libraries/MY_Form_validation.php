<?php
/**
 * My_Form_validation.php
 * User: Noushid P
 * Date: 19/1/18
 */
class MY_Form_validation extends CI_Form_validation {

    public function get_errors() {
        return $this->_error_array;
    }

}