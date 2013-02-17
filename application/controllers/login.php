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
		$customer_id = $this->session->userdata('customer_id');
		$cookie_customer_id= get_cookie('customer_id');
		if (!empty($customer_id) || !empty($cookie_customer_id))
		{
			$url  = base_url();
			redirect($url);
		}
		if($this->input->post('success') == 1)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$result = $this->pages_model->login_user($email, $password);    
			if($result['returnCustomerState']['loggedIn'] == 'true')
			{
			
				if($this->input->post('keep') == 1)
				{
					
						$this->load->helper('cookie');
						$expire = time() + 3600 * 24 * 365;
						setcookie('customer_id', htmlspecialchars($result['returnCustomerDetail']['customerId']), $expire, '/');
						setcookie('email', htmlspecialchars($result['returnCustomerDetail']['email']), $expire, '/');
						setcookie('locale_id', $result['returnCustomerDetail']['localeId'], $expire, '/');
						setcookie('point', $result['returnCustomerDetail']['pointsBalance'], $expire, '/');
						setcookie('pin', $result['returnCustomerDetail']['pin'], $expire, '/');
						setcookie('first_name', $result['returnCustomerDetail']['firstName'], $expire, '/');
						setcookie('last_name', $result['returnCustomerDetail']['lastName'], $expire, '/');
						setcookie('telephone', $result['returnCustomerDetail']['telephone'], $expire, '/');
						setcookie('tier_id', $result['returnCustomerDetail']['tierId'], $expire, '/');
						setcookie('offer_flag', $result['returnCustomerDetail']['customerCanContact'], $expire, '/');
				}
				else
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
						$this->session->set_userdata('offer_flag',$result['returnCustomerDetail']['customerCanContact']);
				}
			
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