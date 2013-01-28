<?php 
/**
* This is the base template
*/
$this->load->view('includes/header');
$this->load->view($current_view);
$this->load->view('includes/footer');

?>