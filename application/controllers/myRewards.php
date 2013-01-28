<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class MyRewards extends CI_Controller{
	
  function __construct()
  {
	  	parent::__construct();
		$this->load->model('pages_model');
		$this->load->library("pagination");
		  $customer_id = $this->session->userdata('customer_id');
		   if (empty($customer_id))
			{
				$url  = base_url().'login';
				redirect($url);
			}
 }		
	
   public function page() {
			$myRewards= $this->pages_model->fetch_allrewards();
			$total_rows = count($myRewards);
			
			$config = array();
			$config["base_url"] = base_url() . "myRewards/page";
			$config["total_rows"] = $total_rows;
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['num_links'] = '2';
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
			$data["results"] =$myRewards ;

			$data["links"] = $this->pagination->create_links();
			$this->session->set_userdata('page', $page);
			$customer_id = $this->session->userdata('customer_id');
			if (!empty($customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/myRewards_view';
			$this->load->view('includes/base_template', $data);
		}
		

}