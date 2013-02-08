<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Votes extends CI_Controller{
	
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
			$data['results'] = $this->pages_model->getAllPolls();
			$customer_id = $this->session->userdata('customer_id');
			if (!empty($customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/votes_view';
			$this->load->view('includes/base_template', $data);
		}
		public function detail() {
			$allPolls = $this->pages_model->getAllPolls();
			foreach($allPolls as $poll)
			{
				if($poll['pollId'] == $this->input->get('id'))
				{
					$data['results'] = $poll;
				}
			}
			$this->session->set_userdata('voteID', $this->input->get('id'));
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/votes_detail_view';
			$this->load->view('includes/base_template', $data);
		}
		public function vote() {
			$this->pages_model->vote_poll( $this->input->get('id'));
			$allPolls = $this->pages_model->getAllPolls();
			foreach($allPolls as $poll)
			{
				if($poll['pollId'] == $this->session->userdata('voteID'))
				{
					$data['results'] = $poll;
				}
			}
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/votes_vote_view';
			$this->load->view('includes/base_template', $data);
		}

}