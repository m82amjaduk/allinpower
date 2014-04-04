<?php
/**
 * Created by PhpStorm.
 * User: amzad
 * Date: 23/03/14
 * Time: 12:04
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $data['page'] = "BusinessPresentation";
    }


    public function index() {
        $data['page'] = "ListOfVideo";
        $this->load->view('main', $data );
    }

    public function businessPresentation() {
        $data['page'] = "BusinessPresentation";
        $this->load->view('main', $data );
    }
}


?>