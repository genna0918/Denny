<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Login extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
  }	
	
	function index(){
		
		if($this->input->post('success') == 1)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$result = $this->pages_model->login_user($email, $password);
   /*       $result['returnCustomerDetail'] = array("customerId"=>1, "email"=>"genna0918@hotmail.com", "localeId"=>1, "pointsBalance"=>0, "firstName"=>"Jin",						"lastName"=>"Genna", "tierId"=>1, "telephone"=>"12 23 444", "loggedIn"=>"true");
			$result['returnCustomerState'] = array("loggedIn"=>"true");                     */      
			if($result['returnCustomerState']['loggedIn'] == 'true')
			{
				$this->session->set_userdata('customer_id', $result['returnCustomerDetail']['customerId']);
				$this->session->set_userdata('email',$result['returnCustomerDetail']['email']);
				$this->session->set_userdata('locale_id',$result['returnCustomerDetail']['localeId']);
				$this->session->set_userdata('point',$result['returnCustomerDetail']['pointsBalance']);
				$this->session->set_userdata('pin',$result['returnCustomerDetail']['pin']);
				$this->session->set_userdata('first_name',$result['returnCustomerDetail']['firstName']);
				$this->session->set_userdata('last_name',$result['returnCustomerDetail']['lastName']);
				$this->session->set_userdata('telephone',$result['returnCustomerDetail']['telephone']);
				$this->session->set_userdata('tier_id',$result['returnCustomerDetail']['tierId']);

				$url  = base_url().'profile';
				redirect($url);
				
			}
			else
			{
				$data['error'] = 1;
				
			}
		}
			
			$data['current_view'] = 'pages/login_view';
			$this->load->view('includes/base_template', $data);
		}
}