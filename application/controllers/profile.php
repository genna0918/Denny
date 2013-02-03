<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Profile extends CI_Controller{
	
  function __construct()
  {
		parent::__construct();
    	$this->load->model('pages_model');
		$this->load->helper('cookie');
		$customer_id = $this->session->userdata('customer_id');
		$cookie_customer_id= get_cookie('customer_id');
		if(empty($cookie_customer_id) && empty($customer_id))
		 {
				$url  = base_url().'login';
				redirect($url);
		   }
	}	
  function index(){
		$result = $this->pages_model->get_tiers();
		 $session_custom_id = $this->session->userdata('customer_id');
		 $cookie_custom_id = get_cookie('customer_id');
		 if(!empty($cookie_custom_id))
		{
			$data['tier_id'] = get_cookie('tier_id');
			$data['point'] = number_format(get_cookie('point'));
		 }
		 else if(!empty($session_custom_id))
		{
			$data['tier_id'] = $this->session->userdata('tier_id');
			$data['point'] = number_format($this->session->userdata('point'));
		 }
		$data['tiers'] = $result['tier'];
		$data['loyalty_card'] = $result['loyalty_card'];
		$data['current_view'] = 'pages/profile_view';
		$this->load->view('includes/base_template', $data);
  }
}