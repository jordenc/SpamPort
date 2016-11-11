<?php

class SpamPort_API {
	
	protected $url = null;
	protected $error = null;
	protected $timeout = null;
	protected $version = '1.0';
	protected $username = null;
	protected $password = null;
	
	public function __construct ($url, $username, $password, $timeout = 1000) {
		
		$this -> url = $url;
		$this -> timeout = $timeout;
		
		$this -> username = $username;
		$this -> password = $password;
	
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
			
		  error_log("CURL error: Code: $errno, Message: $error");
		  return false;
		
		} else {
		
		  return $result;
		
		}
		
	}
	
	public function requestLogin ($domain) {
		
		$command = "version=" . $this -> version ."&function=login&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain;
		
		return $this -> _execute ($command);
		
	}
	
	public function addDomain ($domain, $smtpserver, $transport_type = 'hostname', $archive = 14, $report_to = false) {
		
		$command = "version=" . $this -> version ."&function=add&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain . "&transport=" . $smtpserver . '&transport_type=' . $transport_type . '&archive=' . $archive . '&report_to=' . $report_to;
		
		return $this -> _execute ($command);
		
	}
	
	public function removeDomain ($domain) {
		
		$command = "version=" . $this -> version ."&function=remove&username=" . $this -> username . "&password=" . $this -> password . "&domain=" . $domain;
		
		return $this -> _execute ($command);
		
	}
	
	public function containsError ($result) {
		
		if (substr ($result, 0, 6) == "error=") return true; else return false;
		
	}
	
	public function returnError ($result) {
		
		if (substr ($result, 0, 6) == "error=") {
			
			return substr ($result, 6);
			
		} else return false;
		
	}
	
	public function returnResult ($result) {
		
		if (substr ($result, 0, 7) == "result=") {
			
			return substr ($result, 7);
			
		} else return false;
		
	}

}

?>