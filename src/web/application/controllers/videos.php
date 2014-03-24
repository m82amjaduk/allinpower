<?php
/**
 * Created by PhpStorm.
 * User: amzad
 * Date: 23/03/14
 * Time: 12:04
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller {

    public function index()
    {
        $this->load->view('BusinessPresentation');
    }
}


?>