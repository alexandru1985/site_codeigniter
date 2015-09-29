<?php

class Gallery_model extends CI_Model
{

    private $gallery_path;

    function __construct()
    {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . "../images");
    }

    function do_upload()
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 2000,
        );
        $this->load->library("upload", $config);
        $this->upload->do_upload();
    }

}
