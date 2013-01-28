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
    	$customer_id = $this->session->userdata('customer_id');
			   if (empty($customer_id))
				{
					$url  = base_url().'login';
					redirect($url);
				}

	$this->load->model('pages_model');
  }	
  function index(){
		$result = $this->pages_model->get_tiers();
		$data['tier_id'] = $this->session->userdata('tier_id');
		$data['tiers'] = $result['tier'];
		$data['loyalty_card'] = $result['loyalty_card'];
		$data['point'] = number_format($this->session->userdata('point'));
		$data['current_view'] = 'pages/profile_view';
		$this->load->view('includes/base_template', $data);
  }
}