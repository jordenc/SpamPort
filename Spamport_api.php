<?php

class SpamPort_API {
	
	protected $url = null;
	protected $error = null;
	protected $timeout = null;
	protected $version = '1.5';
	protected $plugin = 'phpclass';
	protected $username = null;
	protected $password = null;
	
	public function __construct ($url, $username, $password, $timeout = 1000) {
		
		$this -> url = $url;
		$this -> timeout = $timeout;
		
		$this -> username = $username;
		$this -> password = $password;
		
		if (! $this -> _isCurl()) print "Curl is required but not enabled";
	
	}
	
	protected function _execute ($command) {
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this -> url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $command);
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
		
		$result = curl_exec ($ch);
		$errno = curl_errno($ch);
		$this -> error = $error = curl_error($ch);
		curl_close ($ch);
		
		if ($errno) {
			
		  print "CURL error: Code: $errno, Message: $error";
		  return false;
		
		} else {
		
		  return $result;
		
		}
		
	}
	
	public function _isCurl(){
		
	    return function_exists('curl_version');
	
	}
	
	public function requestLogin ($domain) {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=login&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain;
		
		return $this -> _execute ($command);
		
	}
	
	public function addDomain ($domain, $smtpserver, $transport_type = 'hostname', $archive = 14, $report_to = false) {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=add&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain . "&transport=" . $smtpserver . '&transport_type=' . $transport_type . '&archive=' . $archive . '&report_to=' . $report_to;
		
		return $this -> _execute ($command);
		
	}
	
	public function removeDomain ($domain) {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=remove&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain;
		
		return $this -> _execute ($command);
		
	}
	
	public function infoDomain ($domain) {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=info&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain;
		
		return $this -> _execute ($command);
		
	}
	
	public function getDomains () {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=get_domains&username=" . $this -> username . "&password=" . $this -> password;
		
		return $this -> _execute ($command);
		
	}
	
	public function newPassword ($domain) {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=new_password&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain;
		
		return $this -> _execute ($command);
		
	}
	
	public function setOutgoing ($domain, $outgoing, $transport) {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=set_outgoing&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain . "&outgoing=" . $outgoing . "&transport=" . $transport;
		
		return $this -> _execute ($command);
		
	}
	
	public function setReportTo ($domain, $report_to = "") {
		
		$command = "version=" . $this -> version ."&plugin=" . $this -> plugin . "&function=set_report_to&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain . "&report_to=" . $report_to;
		
		return $this -> _execute ($command);
		
	}
	
	public function containsError ($result) {
		
		$result = json_decode ($result, true);
		
		if ( isset ($result['error']) ) return true; else return false;
		
	}
	
	public function returnError ($result) {
		
		$result = json_decode ($result, true);
		
		if ( isset ($result['error']) ) {
			
			return $result['error'];
			
		} else return false;
		
	}
	
	public function returnResult ($result) {
		
		$result = json_decode ($result, true);
		
		if ( isset ($result['result']) ) {
			
			return $result['result'];
			
		} else return false;
		
	}

}

?>
