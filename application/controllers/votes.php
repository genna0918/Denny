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
			$result = $this->pages_model->getAllPolls();
	
			$allPolls = array();
			if(isset($result['pollChoices']) && isset($result))
			{
				$allPolls[0] =  $result;
			}
			else
		   {
				$allPolls =  $result;
			}
			$data['results'] = $allPolls;
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
			$result = $this->pages_model->getAllPolls();
			$allPolls = array();
			if(isset($result['pollChoices']) && isset($result))
			{
				$allPolls[0] =  $result;
			}
				else
		   {
				$allPolls =  $result;
			}
			foreach($allPolls as $poll)
			{
				if($poll['pollId'] == $this->input->get('id'))
				{
					if(isset($poll['pollChoices']['id']) && isset($poll))
					{
						$data['results']['pollChoices'][0] = $poll['pollChoices'];
					}
					else
				   {
						$data['results'] = $poll;
					}
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
			$allPolls = array();
			$result = $this->pages_model->getAllPolls();
			if(isset($result['pollChoices']) && isset($result))
			{
				$allPolls[0] =  $result;
			}
			else
		   {
				$allPolls =  $result;
			}
			
			foreach($allPolls as $poll)
			{
				if($poll['pollId'] == $this->input->get('id'))
				{
					if(isset($poll['pollChoices']['id']) && isset($poll))
					{
						$data['results']['pollChoices'][0] = $poll['pollChoices'];
					}
					else
				   {
						$data['results'] = $poll;
					}
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