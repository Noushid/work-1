<?php
/**
 * Migrate.php
 * User: Noushid
 * Date: 26/10/17
 * Time: 8:10 PM
 */


class Migrate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    function index($version = "")
    {
        if ($this->migration->latest() == FALSE) {
            show_error('Error :  ' . $this->migration->error_string());
        } else {
            echo 'Migration run success';
        }
    }
}
