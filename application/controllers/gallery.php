<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function index()
    {
        $this->load->model("gallery_model");

        if ($this->input->post("upload")) {
            $this->gallery_model->do_upload();
        }
        $data['images'] = $this->gallery_model->get_images();
        $this->load->view("gallery_view",$data);
    }

}
