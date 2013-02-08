<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Menu extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
	
 }		
	
     public function index() {
			$data['menus'] = $this->pages_model->get_menu();
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/menu_view';
			$this->load->view('includes/base_template', $data);
		}
	  public function detail() {
		    $id = $this->input->get('id');
			$menus = $this->pages_model->get_menu();
		
			
			foreach($menus['menuGroups'] as $result)
			{
				if($result['id'] == $id)
				{
					$data['subMenus'] = $result;
				}

			}
		
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/menu_detail_view';
			$this->load->view('includes/base_template', $data);
		}

}