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
		$customer_id = $this->session->userdata('customer_id');
			   if (empty($customer_id))
				{
					$url  = base_url().'login';
					redirect($url);
				}
			
 }		
	
     public function index() {
				if($this->input->post('success') == 1)
				{
					  $data = array(
							"first_name" => $this->input->post('first_name'),
							"last_name" => $this->input->post('last_name'),
							"cell_num" => $this->input->post('cell_num'),
							"email" => $this->input->post('email'),
							"country" => $this->input->post('country'),
							"password" => $this->input->post('password')
						);
					$result = $this->pages_model->edit_user($data);

					if($result == 'true')
					{
						$this->session->set_userdata('email',$data['email']);
						$this->session->set_userdata('locale_id',$data['country']);
						$this->session->set_userdata('pin',$data['password']);
						$this->session->set_userdata('first_name',$data['first_name']);
						$this->session->set_userdata('last_name',$data['last_name']);
						$this->session->set_userdata('telephone',$data['cell_num']);
						$data['error'] = 0;
					}
					else
					{
						$data['error'] = 1;
					}
				}
			$data['first_name'] = $this->session->userdata('first_name');
			$data['last_name'] = $this->session->userdata('last_name');
			$data['email'] = $this->session->userdata('email');
			$data['telephone'] = $this->session->userdata('telephone');
			$data['locale_id'] = $this->session->userdata('locale_id');
			$data['pin'] = $this->session->userdata('pin');
			$data['results'] = $this->pages_model->getAllPolls();
			$data['locales'] = $this->pages_model->get_locale();
			$customer_id = $this->session->userdata('customer_id');
			if (!empty($customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/setting_view';
			$this->load->view('includes/base_template', $data);
		}
	 
}