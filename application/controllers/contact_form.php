<?php

class Contact_form extends CI_Controller
{

    function index()
    {
        $data['main_content'] = 'contact_form';
        $this->load->view("includes/template", $data);
    }

    function submit()
    {
        $name = $this->input->post('name');


        $data['main_content'] = 'site';
        if ($this->input->post('name')) {
            $this->load->view($data['main_content']);
        } else {
            $this->load->view("includes/template", $data);
        }
    }

}
