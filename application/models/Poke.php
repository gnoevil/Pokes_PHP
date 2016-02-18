<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poke extends CI_Model {

    public function get_poke_history($user)
	{
		$query = "SELECT users.id, users.name, users.alias, users.email, count(poked_user_id) AS poke_history
				  FROM users LEFT JOIN poked_users ON users.id = poked_user_id
				  WHERE users.id != ? GROUP BY name; ";
		$values = array($user['id']);
		return $this->db->query($query, $values)->result_array();
	}
	public function session_user_pokes($user)
	{
		$query = "SELECT users.id as user_id, users.name, users.alias, count(name) AS poke_count
				  FROM users LEFT JOIN poked_users ON users.id = poked_users.user_id
				  WHERE poked_user_id = ? && users.id != ? GROUP BY name;";
	    $values = array($user['id'], $user['id']);
	    return $this->db->query($query, $values)->result_array();
	}
	public function add_users_poke($poked_user_id, $user_id)
	{
		$query = "INSERT INTO poked_users (poked_user_id, created_at, user_id)
		          VALUES (?,NOW(),?)";
		$values = array($poked_user_id, $user_id);
		return $this->db->query($query, $values);
	}
}
