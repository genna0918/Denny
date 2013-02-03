<?php
include_once('libraries/ip2locationlite.class.php');
require_once('libraries/nusoap.php');

class Pages_model extends CI_Model{
	function __construct()
	{
		global $client, $customer_id;
		$client = new nusoap_client("http://166.78.10.214:8080/figur8Dennys/services/figur8WebService");
		 $this->load->helper('cookie');
		 $session_custom_id = $this->session->userdata('customer_id');
		 $cookie_custom_id = get_cookie('customer_id');;
		 if(!empty($cookie_custom_id))
		{
			$customer_id = $cookie_custom_id;
		 }
		 else if(!empty($session_custom_id))
		{
			$customer_id = $session_custom_id;
		 }
	}
	function check_server($client)
	{
		if ($client->fault) {
				$url  = base_url().'Error500';
				redirect($url);
		} else {
			$err = $client->getError();
			if ($err) {
				$url  = base_url().'Error500';
				redirect($url);
			} 
		}
	}
	function register_user($data){
		global $client;
		$registerParams = array("customerFname"=>$data['first_name'], "customerLname"=>$data['last_name'], "customerPhone"=>$data['cell_num']
			, "customerEmail"=>$data['email'], "customerPIN"=>$data['password'], "localeID"=>$data['country']);
		$result = $client->call('customerRegister', $registerParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	}
	function edit_user($data){
		global $client, $customer_id;		
		$editParams = array("customerId"=>$customer_id, "customerFname"=>$data['first_name'], "customerLname"=>$data['last_name'], "customerPhone"=>$data['cell_num']
			, "customerEmail"=>$data['email'], "customerPin"=>$data['password'], "localeID"=>$data['country']);
		$result = $client->call('customerEdit', $editParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
	
		$this->check_server($client);
		
		return $result;
	}
	function login_user($email, $password){
		$ipLite = new ip2location_lite;
		$ipLite->setKey('a9305140fabfcc8f67233d864c99f4cba8e971fe28305199062830230d154fba');
		$locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
		$latitude = $locations['latitude'];
		$longitude = $locations['longitude'];
		global $client;
		$loginParams = array("eMail"=>$email, "customerPin"=>$password, "latitude"=>$latitude, "longitude"=>$longitude,  "deviceId"=>DEVICE_ID);
		$result = $client->call('customerLogin', $loginParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	}
	function logout_user()
	{
		global $client, $customer_id;
		$logoutParams = array("customerID"=>$customer_id, "deviceID"=>DEVICE_ID);
		$result = $client->call('customerLogout', $logoutParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	}
	function compareEmail($email)
	{
		global $client;
		$forgotParams = array("eMail"=>$email);
		$result = $client->call('customerForgotPIN', $forgotParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	}
	public function fetch_offer() {
		global $client;
		$offersParams = array("customerID"=> 0, "deviceID"=>DEVICE_ID, "storeID"=>STORE_ID);
		$result = $client->call('returnSpecialOffers', $offersParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
   }
  public function fetch_allrewards() {
		global $client;
		$offersParams = array("customerID"=>0, "deviceID"=>DEVICE_ID, "storeID"=>STORE_ID);
		$result = $client->call('returnRewards', $offersParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
   }
   public function reward_purchase($id) {
		global $client, $customer_id;
		$purchaseParams = array("customerID"=>$customer_id, "deviceID"=>DEVICE_ID, "storeID"=>STORE_ID, "rewardID"=>$id);
		$result = $client->call('purchaseReward', $purchaseParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
   }
    public function get_locale() {
		global $client;
		$localeParams = array();
		$result = $client->call('returnLocales', $localeParams , 'http://webService.figur8.com', 'http://webService.figur8.com');

		 return $result;
   }
     public function getAllPolls() {
		global $client, $customer_id;
		$allPollsParams = array("customerID"=>$customer_id);
		$result = $client->call('returnAllPolls', $allPollsParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
	}
	public function get_poll($id) {
		global $client;
		$params = array(
					 'pollID' => $id,
		);
		$result = $client->call('returnPoll', $params , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
	}
	public function vote_poll($id) {
		global $client, $customer_id;
		$params = array(
					'pollChoiceID' => $id,
					"customerID"=>$customer_id
		);
		$result = $client->call('voteOnPoll', $params , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
	}
	public function get_menu() {
		global $client;
		$menuParams = array( 'customerID' => 0);
		$result = $client->call('returnMenu', $menuParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
	}
	public function get_subject() {
		global $client;
		$subjectParams = array();
		$result = $client->call('returnFeedbackSubjects', $subjectParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
	}
	public function feedback_submit($data) {
		global $client, $customer_id;
		$submitParams = array("customerID"=>$customer_id, "feedbackSubjectID"=>$data['feedbackSubjectID'], "storeID"=>STORE_ID, "feedback"=>$data['feedback']);
		
		$result = $client->call('submitFeedback', $submitParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		 return $result;
	}
    public function get_stores(){
		global $client;
		$storeParams = array();
		$result = $client->call('returnStores', $storeParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	}
	public function get_tiers(){
		global $client, $customer_id;
		$tierParams = array();
		$result['tier'] = $client->call('returnTiers', $tierParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$loyaltyParams = array("customerID"=>$customer_id,  "deviceID"=>DEVICE_ID);
		$result['loyalty_card'] = $client->call('returnCustomerLoyaltyCard', $loyaltyParams , 'http://webService.figur8.com', 'http://webService.figur8.com');

		$this->check_server($client);
		return $result;
	
	}
	public function get_loyalty(){
		global $client, $customer_id;
		$loyaltyParams = array("customerID"=>$customer_id,  "deviceID"=>DEVICE_ID);
		$result = $client->call('returnCustomerLoyaltyCard', $loyaltyParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	
	}
	public function change_password($email, $resetCode, $newPIN){
		global $client;
		$changeParams = array("eMail"=>$email, "resetCode"=>$resetCode, "newPIN"=>$newPIN);
		$result = $client->call('customerResetPIN', $changeParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	
	}
	public function get_terms(){
		global $client;
		$termParams = array();
		$result = $client->call('returnTerms', $termParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	
	}
	public function get_privacy(){
		global $client;
		$privacyParams = array();
		$result = $client->call('returnTerms', $privacyParams , 'http://webService.figur8.com', 'http://webService.figur8.com');
		$this->check_server($client);
		return $result;
	
	}
}
	
?>