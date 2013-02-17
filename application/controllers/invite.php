<?php 


/*
 * This is the Controller for the Items page
 * 
 * @author: Silver
 */

class Invite extends CI_Controller{
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
			
			$data['wheres'] = $this->pages_model->get_stores();
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}

			 if(!empty($cookie_customer_id))
			{
				$data['customer_name'] = get_cookie('first_name')." ".get_cookie('last_name');
			 }
			 else if(!empty($customer_id))
			{
				
				$data['customer_name'] = $this->session->userdata('first_name')." ".$this->session->userdata('last_name');
			 }
			$data['current_view'] = 'pages/invite_view';
			$this->load->view('includes/base_template', $data);
		}
	  public function confirm() {
			$customer_id = $this->session->userdata('customer_id');
			$cookie_customer_id= get_cookie('customer_id');
			if (!empty($customer_id) || !empty($cookie_customer_id))
			{
				$data['logged'] = true;
				$data['loyalty_card'] = $this->pages_model->get_loyalty();
			}
			$data['current_view'] = 'pages/invite_confirm_view';
			$this->load->view('includes/base_template', $data);
		}
		
	 public function email_send() {
				$customer_id = $this->session->userdata('customer_id');
				$cookie_customer_id= get_cookie('customer_id');
				 if(!empty($cookie_customer_id))
				{
					$customer_name = get_cookie('first_name')." ".get_cookie('last_name');
					$customer_email = get_cookie('email');
				}
				 else if(!empty($customer_id))
				{
					$customer_name = $this->session->userdata('first_name')." ".$this->session->userdata('last_name');
					$customer_email = $this->session->userdata('email');
				 }
					$date = $this->input->post('date');
					$time = $this->input->post('time');
					$where = $this->input->post('location');
					$email1 = $this->input->post('email1');
					$email2 = $this->input->post('email2');
					$email3 = $this->input->post('email3');
					$email4 = $this->input->post('email4');
					if($email1 != '')
				   {

					$subject = "Invite Denny's";
					$headers  = "MIME-Version: 1.0\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\n";
					$headers  .= "From: ".$customer_email."\n";
					$message = "<h3>".$customer_name.' would like to invite you to meet<br />him at Denny</h3>	
						<h3><strong>'.$date.'<br />at '.$time.'</strong></h3>
								<p><strong>'.$where.'</strong></p>';
					$mail1 = mail($email1,$subject,$message,$headers);
				   }
				   if($email2 != '')
				   {
						$subject = "Invite Denny's";
						$headers  = "MIME-Version: 1.0\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\n";
						$headers  .= "From: ".$customer_email."\n";
						$message = "<h3>".$customer_name.' would like to invite you to meet<br />him at Denny</h3>	
							<h3><strong>'.$date.'<br />at '.$time.'</strong></h3>
									<p><strong>'.$where.'</strong></p>';
						$mail2 = mail($email2,$subject,$message,$headers);
				   }
				   if($email3 != '')
				   {
						$subject = "Invite Denny's";
						$headers  = "MIME-Version: 1.0\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\n";
						$headers  .= "From: ".$customer_email."\n";
						$message = "<h3>".$customer_name.' would like to invite you to meet<br />him at Denny</h3>	
							<h3><strong>'.$date.'<br />at '.$time.'</strong></h3>
									<p><strong>'.$where.'</strong></p>';
						$mail3 = mail($email3,$subject,$message,$headers);
				   }
				   if($email4 != '')
				   {
						$subject = "Invite Denny's";
						$headers  = "MIME-Version: 1.0\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\n";
						$headers  .= "From: ".$customer_email."\n";
						$message = "<h3>".$customer_name.' would like to invite you to meet<br />him at Denny</h3>	
							<h3><strong>'.$date.'<br />at '.$time.'</strong></h3>
									<p><strong>'.$where.'</strong></p>';
						$mail4 = mail($email4,$subject,$message,$headers);
				   }
					$url  = base_url().'invite/confirm';
					redirect($url);
			  
		  
	 }
}