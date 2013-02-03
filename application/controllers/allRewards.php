<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class AllRewards extends CI_Controller{
	
  function __construct()
  {
		parent::__construct();
		$this->load->library("pagination");
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
	
   public function page() {
			$config = array();
			$allRewards= $this->pages_model->fetch_allrewards();
			$total_rows = count($allRewards);
			$config["base_url"] = base_url() . "allRewards/page";
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
			$data["results"] =$allRewards ;
			$data["links"] = $this->pagination->create_links();
			$this->session->set_userdata('page', $page);
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			if(!empty($cookie_customer_id))
			{
				$data['point_cnt'] = get_cookie('point');
			}
			 else if(!empty($customer_id))
			{
				$data['point_cnt'] = $this->session->userdata('point');
			}
			$data['current_view'] = 'pages/allRewards_view';
			$this->load->view('includes/base_template', $data);
			
		}
		public function purchase() {
			$result = $this->pages_model->reward_purchase( $this->input->post('id'));
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if(!empty($cookie_customer_id))
			{
				$point = get__cookie('point') - $this->input->post('point');
				$expire = time() + 3600 * 24;
				setcookie('point', $point, $expire, '/');
			}
			 else if(!empty($customer_id))
			{
				$point = $this->session->userdata('point') - $this->input->post('point');
				$this->session->set_userdata('point', $point);
			}
			
			return json_encode($result);
		}
		public function coupon() {
			$page = 	$this->session->userdata('page');
			if($page == 0)
				$back_url = base_url()."allRewards/page";
			else $back_url = base_url()."allRewards/page/".$page;
			$data['back_url'] = $back_url;
			$myRewards= $this->pages_model->fetch_allrewards();
			$id = $this->input->get('id');
			
			foreach($myRewards as $reward) {
				if($reward['id'] == $id)
				{
					$data["rewardName"] = $reward['rewardName'];
					$data["points"] = $reward['pointsRequired'];
					$data["img_url"] = $reward['thumbMediaURI'];
					$valid_array = explode("-", $reward['validUntil']);
					$data["valid_until"] = $valid_array[1]."/".$valid_array[2]."/".$valid_array[0];
				}
			}
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/coupon_view';
			$this->load->view('includes/base_template', $data);
		}
		
}