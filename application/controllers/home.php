<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Home extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->helper('cookie');
	$this->load->model('pages_model');

  }	
 function index(){		 
		   $customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
		if($this->input->post('success') == 1)
		{
			$id = $this->register();
			if($id > 0)
			{
					$data['current_view'] = 'pages/signupSuccess_view';
					$this->load->view('includes/base_template', $data);	
			}
			else
			{
				
				$locales = $this->pages_model->get_locale();
				$localeName_array = array(); 
				foreach($locales as $key => $value){ 
					$localeName_array[] = $value['localeName']; 
				}
				array_multisort($localeName_array, SORT_ASC, $locales);
				$data['locales'] = $locales;	
				$data['first_name'] = $this->input->post('first_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['cell_num'] = $this->input->post('cell_num');
				$data['email'] = $this->input->post('email');
				$data['country'] = $this->input->post('country');
				$data['offer_flag'] = $this->input->post('offer_flag');
				$data['agree'] = $this->input->post('agree');
				
				$data['current_view'] = 'pages/home_view';
				
				$this->load->view('includes/base_template', $data);	
			}
		}
		else
		{
			$locales = $this->pages_model->get_locale();
		
			if(!empty($locales))
			{
				$localeName_array = array(); 
				foreach($locales as $key => $value){ 
					$localeName_array[] = $value['localeName']; 
				}
				array_multisort($localeName_array, SORT_ASC, $locales);
			}
			
			$data['locales'] = $locales;
		
			$data['current_view'] = 'pages/home_view';
			$this->load->view('includes/base_template', $data);	
		}
	}
	
	function register()
	{		
		
		$date = date('Y-m-d H:i:s');
		$post_offer = $this->input->post('offer_flag');
		if(isset($post_offer))
		   $offer_flag = 1;
		else $offer_flag = 0;

		$data = array(
			"first_name" => htmlspecialchars($this->input->post('first_name')),
			"last_name" => htmlspecialchars($this->input->post('last_name')),
			"cell_num" => $this->input->post('cell_num'),
			"email" => $this->input->post('email'),
			"country" => $this->input->post('country'),
			"password" => $this->input->post('password'),
			"offer_flag" => $offer_flag,
			"create_date" => $date
		);
		$id = $this->pages_model->register_user($data);
		return $id;
	}
	
	function logout()
	{
		
		
		$result = $this->pages_model->logout_user();
	
	if($result == 'true')
		{
			$this->session->sess_destroy(); 
			$expire = time() - 3600 * 24 * 365;
			setcookie('customer_id', '', $expire,'/');
			setcookie('telephone', '', $expire,'/');
			setcookie('email', '', $expire,'/');
			setcookie('locale_id', '', $expire,'/');
			setcookie('point', '', $expire,'/');
			setcookie('pin', '', $expire,'/');
			setcookie('first_name', '', $expire,'/');
			setcookie('last_name', '', $expire,'/');
			setcookie('tier_id', '', $expire,'/');
			setcookie('offer_flag', '', $expire,'/');
   	}
		redirect(''); //redirect to home
	}
}