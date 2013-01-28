<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Home extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');

  }	
 function index(){
		$customer_id = $this->session->userdata('customer_id');
		if (!empty($customer_id))
		{
			$data['logged'] = true;
			$data['loyalty_card'] = $this->pages_model->get_loyalty();
		}
		if($this->input->post('success') == 1)
		{
			$id = $this->register();
			if($id > 0)
			{
					$data['current_view'] = 'pages/signupSuccess_view';
					$this->load->view('includes/base_template', $data);	
			}
			else
			{
				?>
				<script>alert('Registered User');</script>
				<?php
				$data['locales'] = $this->pages_model->get_locale();
				$data['current_view'] = 'pages/home_view';
				$this->load->view('includes/base_template', $data);	
			}
		}
		else
		{
			$data['locales'] = $this->pages_model->get_locale();
			$data['current_view'] = 'pages/home_view';
			$this->load->view('includes/base_template', $data);	
		}
	}
	
	function register()
	{		
		
		$date = date('Y-m-d H:i:s');
		$data = array(
			"first_name" => $this->input->post('first_name'),
			"last_name" => $this->input->post('last_name'),
			"cell_num" => $this->input->post('cell_num'),
			"email" => $this->input->post('email'),
			"country" => $this->input->post('country'),
			"password" => $this->input->post('password'),
			"offer_flag" => $this->input->post('offer_flag'),
			"create_date" => $date
		);
		$id = $this->pages_model->register_user($data);
		return $id;
	}
	
	function logout()
	{
		$result = $this->pages_model->logout_user();

	if($result == 'true')
		{
			$this->session->unset_userdata('customer_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('locale_id');
			$this->session->unset_userdata('point');
			$this->session->unset_userdata('tier_id');
			$this->session->unset_userdata('first_name');
			$this->session->unset_userdata('last_name');
//			session_destroy(); //destroy the php session
   	}
		redirect(''); //redirect to home
	}
}