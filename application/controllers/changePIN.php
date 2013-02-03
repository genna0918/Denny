<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class ChangePIN extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
  }	
function index(){
//		$data['email'] = $this->input->post('eMail');
//		$data['resetCode']  = $this->input->post('resetCode');
		$customer_id = $this->session->userdata('customer_id');
		$cookie_customer_id= get_cookie('customer_id');
		if (!empty($customer_id) || !empty($cookie_customer_id))
		{
			$url  = base_url();
			redirect($url);
		}
		$data['email'] = $this->input->get('eMail');
		$data['resetCode']  = $this->input->get('resetCode');
		if($this->input->post('success') == 1)
		{
				$newPIN = $this->input->post('new_pin');
				$email = $this->input->post('email');
				$resetCode = $this->input->post('resetCode');
				$reuslt = $this->pages_model->change_password($email, $resetCode, $newPIN);
				if($reuslt == 'true')
				{
					$url  = base_url().'changePIN/success';
					redirect($url);
				}
		}
			
			$data['current_view'] = 'pages/changePIN_view';
			$this->load->view('includes/base_template', $data);
		}
		function success()
		{
			$data['current_view'] = 'pages/changeSuccess_view';
			$this->load->view('includes/base_template', $data);
		}
}