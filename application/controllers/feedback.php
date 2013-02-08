<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Feedback extends CI_Controller{
	
  function __construct()
  {
		parent::__construct();
		$this->load->model('pages_model');
		
		
	}		
	public function index() {
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['subjects'] =  $this->pages_model->get_subject();
			$data['current_view'] = 'pages/feedback_view';
			$this->load->view('includes/base_template', $data);
		}
	
	public function success() {
			$data = array(
						"feedbackSubjectID" => $this->input->post('subject'),
						"feedback" => $this->input->post('message')
					);
		 
			$result = $this->pages_model->feedback_submit($data);
			
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/feedback_success_view';
			$this->load->view('includes/base_template', $data);
	
	}
}
