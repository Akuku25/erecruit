<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site_security extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function make_hash($password)
	{
		$safe_pass = $this->unbreakable_hash($password);
		echo $safe_pass;
	}

	function unbreakable_hash($password)
	{
		$new_pass = $password .= "bla";
		return $new_pass;
	}

	function _make_sure_is_admin()
	{
		$user_id = $this->session->userdata('user_id');

		if (!is_numeric($user_id)) {
			redirect(base_url());
		}
	}

	function not_allowed()
	{
		echo "You are not allowed to be here";
	}

}
