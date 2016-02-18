<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->Model('User');
    //   $this->output->enable_profiler();
    }

    public function index()
    {
        $this->load->view('users/index');
    }

    public function register() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|trim|ucwords');
        $this->form_validation->set_rules('alias', 'Alias', 'required|min_length[2]|trim|ucwords');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|ucwords');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]|trim|md5');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|md5');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|min_length[10]');
        if($this->form_validation->run())
        {
            $this->load->model('user');
            $user['email'] = $this->input->post('email');
            if($this->user->get_user_by_email($user))
            {
                $this->session->set_flashdata('email', '<p>Sorry, this email is already in use</p>');
                redirect('/');
            }
                $dob = $this->input->post('dob');
                $user = $this->input->post();
                $this->session->set_userdata('user', $user);
                redirect('/users/add_user');
            }
        else
        {
            $this->session->set_flashdata('name', form_error('name'));
            $this->session->set_flashdata('alias', form_error('alias'));
            $this->session->set_flashdata('email', form_error('email'));
            $this->session->set_flashdata('password', form_error('password'));
            $this->session->set_flashdata('confirm_password', form_error('confirm_password'));
            $this->session->set_flashdata('dob', form_error('dob'));
            redirect('/');
        }
    }
    public function add_user()
    {
        $user = $this->session->userdata('user');
        $this->load->model('user');
        if($this->user->create_user($user))
        {
            redirect('/users/get_user');
        }
        else
        {
            $this->session->set_flashdata('name', '<p>Sorry, there was an error</p>');
            redirect('/');
        }
    }

    public function get_user()
    {
        $this->load->model('user');
        $user = $this->session->userdata('user');
        $user = $this->user->get_user_by_email($user);
        if($user)
        {
            $this->session->set_userdata('user', $user);
            redirect('/pokes/get_poke_history');
        }
        else
        {
            $this->session->set_flashdata('name', '<p>Sorry, there was an error.</p>');
            redirect('/');
        }
    }
    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email2', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password2', 'Password', 'required|md5');
        if($this->form_validation->run())
        {
            $user = $this->input->post();
            $this->session->set_userdata('user', $user);
            redirect('/users/get_user');
        }
        else
        {
            $this->session->set_flashdata('email2', form_error('email2'));
            $this->session->set_flashdata('password2', form_error('password2'));
            redirect('/');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
  }
