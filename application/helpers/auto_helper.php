<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Checking user logged or not
 */
if (!function_exists('logged')) {
    function logged() {
        $CI = & get_instance();
        $user_profile = $CI->session->userdata('user_profile');
        if ($user_profile == "") {
            redirect('login', 'refresh');
        } else {
            return $user_profile;
        }
    }
}


/**
 * Displaying profile value
 */
if (!function_exists('profile')) {
    function profile($row) {
        $CI = & get_instance();
        $user_profile = $CI->session->userdata('user_profile');
        if ($user_profile == "") {
            return "";
        } else {
            return $user_profile->$row;
        }
    }
}

/**
* Declaring asset function
*/
if (!function_exists('asset')) {
    function asset($file = NULL) {
		return base_url() . "assets/" . $file;
    }
}

/**
* Get IP address
*/
if (!function_exists('getIP')) {
    function getIP() {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
}

/**
 * Convert multidimensional array into single array
 */
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value) ) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}