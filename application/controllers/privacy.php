<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Privacy extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
 }		
	
     public function index() {

			$data['privacy'] = $this->pages_model->get_privacy();
			$data['current_view'] = 'pages/privacy_view';
			$this->load->view('includes/base_template', $data);
		}
}