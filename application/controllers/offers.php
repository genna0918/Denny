<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Offers extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
	$this->load->library("pagination");
   }		
public function page() {
			$config = array();
			$offers= $this->pages_model->fetch_offer();
			$total_rows = count($offers);
			$config["base_url"] = base_url() . "offers/page";
			$config["total_rows"] = $total_rows;
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
	//		$data["results"] = $this->pages_model->fetch_offer($config["per_page"], $page);
			$data['limit'] = $config["per_page"];
			$data['start'] = $page;
			
			$data["results"] =$offers ;
			$data["links"] = $this->pagination->create_links();
			$this->session->set_userdata('page', $page);
			
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/offers_view';
			$this->load->view('includes/base_template', $data);
		}
		public function detail() {

			$page = 	$this->session->userdata('page');
			if($page == 0)
				$back_url = base_url()."offers/page";
			else $back_url = base_url()."offers/page/".$page;
			$data['back_url'] = $back_url;
			$offers= $this->pages_model->fetch_offer();
			$id = $this->input->get('id');
			
			foreach($offers as $offer) {
				if($offer['id'] == $id)
				{
					$data["offer_name"] = $offer['specialOfferName'];
					$data["desc"] = $offer['desc'];
					$data["id"] = $offer['id'];
					$data["img_url"] = $offer['mediaURI'];
					$valid_array = explode("-", $offer['validUntil']);
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
			$data['current_view'] = 'pages/offers_detail_view';
			$this->load->view('includes/base_template', $data);
		}

}