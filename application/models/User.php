<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function create_user($user)
    {
        $query = "INSERT INTO users (name, alias, email, password, dob, created_at, updated_at)
                  VALUES (?,?,?,?,?,NOW(), NOW())";
        $password = array($user['name'], $user['alias'],  $user['email'], $user['password'], $user['dob']);
        return $this->db->query($query, $password);
    }
    public function get_user_by_email($post)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        if($post['email'])
        {
            // email entered at registration
            $email = $post['email'];
        }

        $values = array($email);
        return $this->db->query($query, $values)->row_array();
    }
  }
