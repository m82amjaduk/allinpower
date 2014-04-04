<?php
/**
 * Created by PhpStorm.
 * User: amzad
 * Date: 04/04/14
 * Time: 15:19
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fu extends CI_Controller { // fu = First:Utility

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $data['page'] = 'fu';
    }


    public function index()
    {
        $data['page'] = 'fu';
        $this->load->view('main', $data);
    }
}

?>