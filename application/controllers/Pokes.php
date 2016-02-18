<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokes extends CI_Controller {
        public function __construct()
        {
          parent::__construct();
          $this->load->Model('Poke');
        //   $this->output->enable_profiler();
        }
    	public function index()
    	{
    		$this->load->view('Pokes/index');
    	}
    	public function get_poke_history()
    	{
    		$user = $this->session->userdata('user');
    		$this->load->model('poke');
    		$history = $this->poke->get_poke_history($user);
    		$pokes = $this->poke->session_user_pokes($user);
    		$this->session->set_userdata('poke_history', $history);
    		$this->session->set_userdata('pokes', $pokes);
    		redirect('/pokes');
    	}

    	public function poke_user($poked_user_id, $user_id)
    	{
    		$this->load->model('poke');
    		$this->poke->add_users_poke($poked_user_id, $user_id);
    		redirect('/pokes/get_poke_history');
    	}

    }
