<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function index()
    {
        $this->load->model('model_data');
        $row['dt'] = $this->model_data->view();
        $this->load->view('data_view', $row);
        $this->load->library('pagination');
        $this->load->library('table');
        $config['base_url'] = 'http://localhost/basicsite/test/index';
        $config['total_rows'] = $this->db->get('users')->num_rows();
        $config['per_page'] = 3;
        $config['num_links'] = 5;
        $data = $this->db->get('users', $config['per_page'], $this->uri->segment(3));
        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
        echo $this->table->generate($data);
    }

    public function add()
    {
        $this->load->view('add');
    }

    public function submit()
    {
        $this->load->model('model_data');
        $this->model_data->submit();
    }

    public function edit()
    {
        $this->load->model('model_data');
        $kd = $this->uri->segment(3);
        $dt = $this->model_data->edit($kd);
        $data['kd'] = $dt->id;
        $data['nm'] = $dt->name;
        $data['no'] = $dt->tel;
        $data['ct'] = $dt->city;
        $data['st'] = $dt->state;
        $this->load->view('edit', $data);
    }

    public function update()
    {
        $this->load->model('model_data');
        $this->model_data->update();
    }

    public function del()
    {
        $this->load->model('model_data');
        $kd = $this->uri->segment(3);
        $this->model_data->delete($kd);
        redirect(base_url() . 'test');
    }

}
