<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->is_logged_in();
        $this->logout();
        $this->load->library("session");
    }

    public function index()
    {

        $this->home();
    }

    public function home()
    {
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData("home");

        $this->load->view("site_nav");
        $this->load->view("site/home", $data);
        $this->load->view("footer");
    }

    public function about()
    {
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_about");
        $this->load->view("footer");
    }

    public function contact()
    {
        $data["message"] = "";
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_contact", $data);
        $this->load->helper("form");
        $this->load->view("footer");
        $data = array(
            "id" => "fullName",
            "name" => "fullName",
            "value" => set_value("fullName")
        );
        $data = array(
            "id" => "email",
            "name" => "email",
            "value" => set_value("email")
        );
        $data = array(
            "id" => "message",
            "name" => "message",
            "value" => set_value("message")
        );
    }

    public function send_email()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fullName", "Full Name", "required|trim|alpha|xss_clean");
        $this->form_validation->set_rules("email", "Emai Address", "required|trim|valid_email|xss_clean");
        $this->form_validation->set_rules("message", "Message", "required|trim|xss_clean");
        if ($this->form_validation->run() == FALSE) {
            $data["message"] = "";
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_contact", $data);
            $this->load->view("footer");
        } else {
            $data["message"] = "Mail-ul a fost trimis!";

            $this->load->library("email");
            $this->email->from(set_value("email"), set_value("fullName"));
            $this->email->to("alexandru_panzaru@yahoo.com");
            $this->email->subject("Mesaj");
            $this->email->message(set_value("message"));
            $this->email->send();

            echo $this->email->print_debugger();


            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_contact", $data);
            $this->load->view("footer");
        }
    }

    function is_logged_in()
    {
        $this->load->library("session");
        $is_logged_in = $this->session->userdata('is_logged_in');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $this->load->view('site_header', $data);
        if (!isset($is_logged_in) || $is_logged_in !== true) {

            echo "Nu aveti permisunea pentru a intra pe site.<a href= 'login'>Login</a>";
            die();
        }
    }

    function logout()
    {
        $this->load->library("session");
        $this->session->unset_userdata('is_logged_in');
        $this->session->sess_destroy();
    }

}
