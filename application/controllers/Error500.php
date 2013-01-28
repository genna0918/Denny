<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Error500 extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
 }		
	
     public function index() {

			$data['current_view'] = 'pages/500error_view';
			$this->load->view('includes/base_template', $data);
		}
}