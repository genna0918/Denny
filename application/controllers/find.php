<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Find extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
	$this->load->library("pagination");
 }		
	
   public function page() {
			$config = array();
			$stores= $this->pages_model->get_stores();
			$total_rows = count($stores);
			$config["base_url"] = base_url() . "find/page";
			$config["total_rows"] =  $total_rows;
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['num_links'] = ' 2'; 
			$config['first_link'] = '';
			$config['last_link'] = '';
			$config['prev_link'] = ' ';
			$config['next_link'] = ' ';
			$config['first_tag_open'] = '<li class="first" style="margin-right: 7px;">';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="last">';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li class="next">';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['limit'] = $config["per_page"];
			$data['start'] = $page;
			$data["stores"] =$stores;
			$data["links"] = $this->pagination->create_links();
			$this->session->set_userdata('page', $page);
			$this->session->set_userdata('search_flag', 0);
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/find_view';
			$this->load->view('includes/base_template', $data);
		}
		public function search() {
			
			$stores= $this->pages_model->get_stores();
			$data["stores"] =$stores;
			if($this->input->post('postal'))
			{
				$data['postal_name'] = trim($this->input->post('postal'));	
				$this->session->set_userdata('postal_name', $this->input->post('postal'));
			}
			else
			{
				$data['postal_name'] = trim($this->session->userdata('postal_name'));
			}
			$this->session->set_userdata('search_flag', 1);
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/find_search_view';
			$this->load->view('includes/base_template', $data);
		}
		public function profile() {
			$search_flag = 	$this->session->userdata('search_flag');
			$page = 	$this->session->userdata('page');
			if($search_flag == 1)
			{
				$back_url = base_url()."find/search";
			}
			else
			{
				if($page == 0)
					$back_url = base_url()."find/page";
				else 
					$back_url = base_url()."find/page/".$page;
			}
			$data['back_url'] = $back_url;
			$stores= $this->pages_model->get_stores();
			$id = $this->input->get('id');	
			$data["stores"] =$stores;
			foreach($stores as $store)
			{
				if($store['id'] == $id)
				{
					$data['store'] = $store;
				}
			}
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/find_detail_view';
			$this->load->view('includes/base_template', $data);
		}

}