<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
	}

	function create()
	{
		$this->load->module('site_security');
		$this->site_security->_make_sure_is_admin();

		$update_id = $this->uri->segment(3);
		$submit = $this->input->post('submit', TRUE);

		if ($submit=="Submit")
		{
			//process the form
			$this->form_validation->set_rules('title', 'Job Title', 'required|max_length[255]|callback_title_check');
			$this->form_validation->set_rules('company', 'Company', 'required|max_length[255]');
			$this->form_validation->set_rules('location', 'Location', 'required|max_length[255]');
			$this->form_validation->set_rules('description', 'Description', 'required|max_length[255]');
			$this->form_validation->set_rules('responsibilities', 'Responsibilities', 'required');
			$this->form_validation->set_rules('skills', 'Skills', 'required');
			$this->form_validation->set_rules('perks', 'Perks', 'required');
			$this->form_validation->set_rules('duration', 'Duration', 'required');
			$this->form_validation->set_rules('expires', 'Expires', 'required');
		} else
		{
			if ($submit=="Cancel")
			{
				redirect('jobs/manage');
			}
		}

		if ($this->form_validation->run() == TRUE)
		{
			// get the variables
			$data = $this->fetch_data_from_post();
			$data['created_by'] = $this->session->userdata('user_id');

			if (is_numeric($update_id))
			{
				// update Job
				$this->_update($update_id, $data);
				$flash_msg = "The job details were successfully updated";
				$value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
				$this->session->set_flashdata('job', $value);
				redirect('jobs/create/'.$update_id);
			}
			else
			{
				// insert item into table
				$this->_insert($data);
				$update_id = $this->get_max(); // get the id of the last job

				$flash_msg = "The job was successfully added";
				$value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
				$this->session->set_flashdata('job', $value);
				redirect('jobs/create/'.$update_id);
			}
		}

		if ((is_numeric($update_id)) && $submit!="Submit")
		{
			$data = $this->fetch_data_from_db($update_id);
		}
		else
		{
			$data = $this->fetch_data_from_post();
		}

		if (!is_numeric($update_id))
		{
			$data['headline'] = "Add New Job";
		}
		else
		{
			$data['headline'] = "Update Job Details";
		}

		$data['update_id'] = $update_id;
		$data['flash'] = $this->session->flashdata('job');
		$data['view_file'] = "create";
		$this->load->module('templates');
		$this->templates->admin($data);
	}

	function manage()
	{
		$this->load->module('site_security');
		$this->site_security->_make_sure_is_admin();

		$data['query'] = $this->get('title');
		$data['headline'] = "Manage Jobs";

		$data['view_file'] = "manage";
		$this->load->module('templates');
		$this->templates->admin($data);
	}

	function fetch_data_from_post()
	{
		$data['title'] = $this->input->post('title', TRUE);
		$data['company'] = $this->input->post('company', TRUE);
		$data['location'] = $this->input->post('location', TRUE);
		$data['description'] = $this->input->post('description', TRUE);
		$data['responsibilities'] = $this->input->post('responsibilities', TRUE);
		$data['skills'] = $this->input->post('skills', TRUE);
		$data['perks'] = $this->input->post('perks', TRUE);
		$data['salary_min'] = $this->input->post('salary_min', TRUE);
		$data['salary_max'] = $this->input->post('salary_max', TRUE);
		$data['duration'] = $this->input->post('duration', TRUE);
		$data['expires'] = $this->input->post('expires', TRUE);
		$data['deleted'] = $this->input->post('deleted', TRUE);
		return $data;
	}

	function fetch_data_from_db($update_id)
	{
		if (!is_numeric($update_id)) {
			$this->site_security->not_allowed();
		}

		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['title'] = $row->title;
			$data['company'] = $row->company;
			$data['location'] = $row->location;
			$data['description'] = $row->description;
			$data['responsibilities'] = $row->responsibilities;
			$data['skills'] = $row->skills;
			$data['perks'] = $row->perks;
			$data['salary_min'] = $row->salary_min;
			$data['salary_max'] = $row->salary_max;
			$data['duration'] = $row->duration;
			$data['expires'] = $row->expires;
			$data['deleted'] = $row->deleted;
		}

		if (!isset($data))
		{
			$data = "";
		}

		return $data;
	}

	function get($order_by)
	{
		$this->load->model('mdl_jobs');
		$query = $this->mdl_jobs->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by)
	{
		$this->load->model('mdl_jobs');
		$query = $this->mdl_jobs->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id)
	{
		$this->load->model('mdl_jobs');
		$query = $this->mdl_jobs->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value)
	{
		$this->load->model('mdl_jobs');
		$query = $this->mdl_jobs->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data)
	{
		$this->load->model('mdl_jobs');
		$this->mdl_jobs->_insert($data);
	}

	function _update($id, $data)
	{
		$this->load->model('mdl_jobs');
		$this->mdl_jobs->_update($id, $data);
	}

	function _delete($id)
	{
		$this->load->model('mdl_jobs');
		$this->mdl_jobs->_delete($id);
	}

	function count_where($column, $value)
	{
		$this->load->model('mdl_jobs');
		$count = $this->mdl_jobs->count_where($column, $value);
		return $count;
	}

	function get_max()
	{
		$this->load->model('mdl_jobs');
		$max_id = $this->mdl_jobs->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query)
	{
		$this->load->model('mdl_jobs');
		$query = $this->mdl_jobs->_custom_query($mysql_query);
		return $query;
	}

	function title_check($str)
	{
		$update_id = $this->uri->segment(3);

		$mysql_query = "SELECT * FROM jobs WHERE title='$str'";

		if (is_numeric($update_id))
		{
			$mysql_query .= " AND id!='$update_id'";
		}

		$query = $this->_custom_query($mysql_query);
		$num_rows = $query->num_rows();

		if ($num_rows>0)
		{
			$this->form_validation->set_message('title_check', 'The job title you have submitted already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

}
