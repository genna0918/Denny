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
			$menus = $this->pages_model->get_menu();
			$menu_array = array(); 
			$menu_align = array(); 
			foreach($menus['menuGroups'] as $key => $value){ 
				$menu_array[] = $value; 
			}
			foreach($menu_array as $key => $value){ 
				$menu_align[] = $value['menuGroupName']; 
			}
		
			array_multisort($menu_align, SORT_ASC, $menu_array);
			
			$data['menus'] = $menu_array;
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