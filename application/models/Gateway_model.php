<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gateway_model extends ME_Model
{	
	function __construct()
	{
		parent::__construct();
		$this->load->library('curl'); 
	}

	private function credentails_paypal()
	{
		$sandbox = TRUE;
 
		// Set PayPal API version and credentials.
		$api['version'] = '85.0';
		$api['endpoint'] = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
		$api['username'] = $sandbox ? 'ushispanicradio-facilitator_api1.gmail.com' : 'ushispanicradio_api1.gmail.com';
		$api['password'] = $sandbox ? 'EHSN432JAY4JNX9U' : 'MFXACV4AGA7NWRNZ';
		$api['signature'] = $sandbox ? 'A2FCQxSJvUSgHO9rZjtaTWhYRnkoAklM9lpKZnW82WpfMkeaudfR-XOS' : 'AFcWxV21C7fd0v3bYYYRCpSSRl31A2m4sn9U7uPBX32MGuegk768VnwJ';
		$api['remote_addr'] = $_SERVER['REMOTE_ADDR'];
		
		return (object)$api;
	}

	private function verify_paypal($customer,$total)
	{
		$api = $this->credentails_paypal();

		return array
    (
	    'METHOD' => 'DoDirectPayment', 
	    'USER' => $api->username, 
	    'PWD' => $api->password, 
	    'SIGNATURE' => $api->signature, 
	    'VERSION' => $api->version, 
	    'PAYMENTACTION' => 'Sale',                   
	    'IPADDRESS' => $api->remote_addr,
	    
	    'CREDITCARDTYPE' => $customer->cc_type, 
	    'ACCT' => $customer->ccnumber,                        
	    'EXPDATE' => $customer->exp_month.$customer->exp_year,           
	    'CVV2' => $customer->cvc, 
	    'FIRSTNAME' => $customer->firstname, 
	    'LASTNAME' => $customer->lastname, 
	    'STREET' => $customer->street, 
	    'CITY' => $customer->city, 
	    'STATE' => $customer->state,                     
	    'COUNTRYCODE' => 'US', 
	    'ZIP' => $customer->zip, 
	    'AMT' => round($total, 2), 
	    'CURRENCYCODE' => 'USD', 
	    'DESC' => 'Shopping Checkout'
	  );
	}

	public function paypal($customer,$total)
	{
		$nvp_string = '';
		$request_params = $this->verify_paypal($customer,$total);
		foreach($request_params as $var=>$val)
		{
		  $nvp_string .= '&'.$var.'='.urlencode($val);    
		}
		
		$api = $this->credentails_paypal();

		$this->curl->create($api->endpoint);
		$this->curl->options(
			array(
				CURLOPT_VERBOSE => 1,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => 1
			)
		);

		$this->curl->post($nvp_string);
		$this->curl->execute();

		$response['error_code'] = $this->curl->error_code;
		$response['error_string'] = $this->curl->error_string;
		$response['error_code'] = $this->curl->info;

		return $response;
	}
	
}