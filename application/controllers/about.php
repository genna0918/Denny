<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class About extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
 }		
	
     public function index() {
			$customer_id = $this->session->userdata('customer_id');
			if (!empty($customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/about_view';
			$this->load->view('includes/base_template', $data);
		}
}