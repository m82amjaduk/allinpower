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

    public function businessPresentation($link) {
        $data['link'] = "//www.youtube.com/embed/$link";
        $data['page'] = "videos";
        $this->load->view('main', $data );
    }
//
//    public function NewRepresentatives() {
//        $data['link'] = '//www.youtube.com/embed/pCP3USzbR8A';
//        $data['page'] = "videos";
//        $this->load->view('main', $data );
//    }
//
//    public function MarcIsaac() {
//        $data['link'] = '//www.youtube.com/embed/';
//        $data['page'] = "videos";
//        $this->load->view('main', $data );
//    }
//
//    public function ACNScamInvestigation2 () {
//        $data['link'] = '//www.youtube.com/embed/SPrUioiP8Is';
//        $data['page'] = "videos";
//        $this->load->view('main', $data );
//    }
}


?>