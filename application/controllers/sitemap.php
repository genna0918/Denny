<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Sitemap extends CI_Controller{
	
  function __construct()
  {
	parent::__construct();
	$this->load->model('pages_model');
 }		
	
     public function index() {

			$data['terms'] = $this->pages_model->get_terms();
			$data['current_view'] = 'pages/sitemap_view';
			$this->load->view('includes/base_template', $data);
		}
}