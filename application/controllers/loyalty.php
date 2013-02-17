<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Loyalty extends CI_Controller{
	
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
	
     public function index() {
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			
				$data['current_view'] = 'pages/loyalty_view';
				 $this->load->view('includes/base_template', $data);
			
		}

	
	 
}