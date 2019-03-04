<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller
{

	function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
	}

	function _in_you_go($email) {
		// if login success, give them a session and send them to the admin panel
		$query = $this->get_where_custom('email', $email);
		foreach ($query->result() as $row) {
			$user_id = $row->id;
		}
		//print_r($user_id);die;
		$this->session->set_userdata('user_id', $user_id);

		redirect('dashboard/home');
	}

	function submit()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
		$this->form_validation->set_rules('pword', 'Password', 'required|xss_clean|callback_pword_check');

		if ($this->form_validation->run($this) == FALSE)
		{
			$this->login();
		}
		else
		{
			$email = $this->input->post('email');
			$this->_in_you_go($email);
		}
	}

	function pword_check($pword)
	{
		$email = $this->input->post('email', TRUE);
		$pword = Modules::run('site_security/make_hash', $pword);

		$this->load->model('mdl_users');
		$result = $this->mdl_users->pword_check($email, $pword);

		if ($result == FALSE)
		{
			$this->form_validation->set_message('pword_check', 'Username and/or password do not match');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function login() {
		$data = $this->get_data_from_post();
		$this->load->view('loginform', $data);
	}

	function get_data_from_post() {
		$data['email'] = $this->input->post('email', TRUE);
		$data['pword'] = $this->input->post('password', TRUE);
		return $data;
	}

	function get($order_by) {
		$this->load->model('mdl_users');
		$query = $this->mdl_users->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('mdl_users');
		$query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('mdl_users');
		$query = $this->mdl_users->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('mdl_users');
		$query = $this->mdl_users->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('mdl_users');
		$this->mdl_users->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('mdl_users');
		$this->mdl_users->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('mdl_users');
		$this->mdl_users->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('mdl_users');
		$count = $this->mdl_users->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('mdl_users');
		$max_id = $this->mdl_users->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query) {
		$this->load->model('mdl_users');
		$query = $this->mdl_users->_custom_query($mysql_query);
		return $query;
	}

}
