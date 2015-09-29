<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function index()
    {
        $this->load->model("gallery_model");
        $this->load->view("upload");
        if ($this->input->post("upload")) {
           $this->gallery_model->do_upload();  
        }
    }

    
    
}

