<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Setting extends CI_Controller{
	
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
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			

			if($this->input->post('success') == 1)
			{
					$post_offer = $this->input->post('offer_flag');
					
					if(!empty($post_offer))
					{
							$offer_flag = 1;
							$offer_flag2 = true;
					}
					else 
					{
							$offer_flag = 0;
							$offer_flag2 = false;
					}
				
					$data = array(
						"first_name" => trim($this->input->post('first_name')),
						"last_name" => trim($this->input->post('last_name')),
						"cell_num" => $this->input->post('cell_num'),
						"email" => $this->input->post('email'),
						"country" => $this->input->post('country'),
						"password" => $this->input->post('password'),
						"offer_flag" => $offer_flag
					);
					$result = $this->pages_model->edit_user($data);
					if($result == 'true')
					{
						$customer_id = $this->session->userdata('customer_id');
						$cookie_customer_id= get_cookie('customer_id');
						if(!empty($cookie_customer_id))
						{
							$expire = time() + 3600 * 24;
							setcookie('email', $data['email'], $expire, '/');
							setcookie('locale_id', $data['country'], $expire, '/');
							setcookie('pin', $data['password'], $expire, '/');
							setcookie('first_name', $data['first_name'], $expire, '/');
							setcookie('last_name', htmlspecialchars($data['last_name']), $expire, '/');
							setcookie('telephone', htmlspecialchars($data['cell_num']), $expire, '/');
							setcookie('offer_flag', $offer_flag2 , $expire, '/');
						 }
						 else if(!empty($customer_id))
						{
							
							$this->session->set_userdata('email',$data['email']);
							$this->session->set_userdata('locale_id',$data['country']);
							$this->session->set_userdata('pin',$data['password']);
							$this->session->set_userdata('first_name',htmlspecialchars($data['first_name']));
							$this->session->set_userdata('last_name',htmlspecialchars($data['last_name']));
							$this->session->set_userdata('telephone',$data['cell_num']);
							$this->session->set_userdata('offer_flag',$offer_flag2);

						 }
						 
						  $customer_id = $this->session->userdata('customer_id');
							$cookie_customer_id= get_cookie('customer_id');
							if (!empty($customer_id) || !empty($cookie_customer_id))
							{
								$data['logged'] = true;
								$data['loyalty_card'] = $this->pages_model->get_loyalty();
							}
							$data['current_view'] = 'pages/setting_success_view';
							$this->load->view('includes/base_template', $data);
					  }
					  else
					  {
						$data['first_name'] = htmlspecialchars($data['first_name']);
						$data['last_name'] = htmlspecialchars($data['last_name']);
						$data['email'] = $data['email'];
						$data['telephone'] = $data['cell_num'];
						$data['locale_id'] = $data['country'];
						$data['pin'] = $data['password'];
						$data['offer_flag'] = $offer_flag2;
						$data['error'] = 1;
					  }
					 
					
			}
			else
		    {
				
				if(!empty($cookie_customer_id))
				{
					$data['first_name'] = get_cookie('first_name');
					$data['last_name'] = get_cookie('last_name');
					$data['email'] = get_cookie('email');
					$data['telephone'] = get_cookie('telephone');
					$data['locale_id'] = get_cookie('locale_id');
					$data['pin'] = get_cookie('pin');
					$data['offer_flag'] = get_cookie('offer_flag');
				 }
				 else if(!empty($customer_id))
				{
					
					$data['first_name'] = $this->session->userdata('first_name');
					$data['last_name'] = $this->session->userdata('last_name');
					$data['email'] = $this->session->userdata('email');
					$data['telephone'] = $this->session->userdata('telephone');
					$data['locale_id'] = $this->session->userdata('locale_id');
					$data['pin'] = $this->session->userdata('pin');
					$data['offer_flag'] = $this->session->userdata('offer_flag');
				 }
				
			}
				
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
				 $data['current_view'] = 'pages/setting_view';
				 $this->load->view('includes/base_template', $data);
			
		}

	
	 
}