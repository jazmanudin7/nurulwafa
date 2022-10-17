<?php

class Model_auth extends CI_Model{
	
	function login(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$query = "SELECT * FROM users 
		INNER JOIN profile ON profile.id = users.id_profile
		WHERE username = '$username' AND password = '$password'";		
		return $this->db->query($query);
		
	}

}

?>