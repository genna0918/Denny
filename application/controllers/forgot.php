<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Forgot extends CI_Controller{
	
  function __construct()
  {
		parent::__construct();
	$this->load->model('pages_model');
  }	
	
	function index(){
		
		if($this->input->post('success') == 1)
		{
			$reuslt = $this->pages_model->compareEmail( $this->input->post('email') );
			
			if($reuslt == 'true')
			{
				$data['error'] = 0;

			}
			else
			{
				$data['error'] = 1;
			}
		}
		$data['current_view'] = 'pages/forgot_view';
		$this->load->view('includes/base_template', $data);
		
	}
	
}