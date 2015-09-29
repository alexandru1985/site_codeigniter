<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
  session_start();
class Login extends CI_Controller
{

    function index()
    {
        $data['main_content'] = 'login_form';
        $this->load->view("includes/template", $data);
      
    }

    function validate_form()
    {
        $this->load->model("membership_model");
        $query = $this->membership_model->validate();
        if ($query) {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true,
            );
            $this->load->library("session");
            $this->session->set_userdata($data);
            redirect('site');
        } else {
            $this->index();
        }
    }

    function signup()
    {
        $data['main_content'] = 'signup_form';
        $this->load->view("includes/template", $data);
    }

    function create_member()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("first_name", "Name", "required|trim|alpha|xss_clean");
        $this->form_validation->set_rules("last_name", "Last Name", "required|trim|alpha|xss_clean");
        $this->form_validation->set_rules("email_address", "Email Address", "trim|xss_clean");
        $this->form_validation->set_rules("username", "Username", "required|min_lengh['4']");
        $this->form_validation->set_rules("password", "Password", "required|min_lengh['4']|max_lengh['32']");
        $this->form_validation->set_rules("password2", "Password Confirmation", "trim|required|matches[password]");

        if ($this->form_validation->run() === false) {
            $this->signup();
        } else {
            $this->load->model("membership_model");
            if ($query = $this->membership_model->create_member()) {
                $data['main_content'] = 'signup_succesful';
                $this->load->view("includes/template", $data);
            } else {
                $this->load->view("signup_form");
            }
        }
    }

}
