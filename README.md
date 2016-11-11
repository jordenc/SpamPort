# SpamPort PHP Class
PHP API class for SpamPort.com spam filtering

Download our SpamPort_api.php file for easy integration of the https://www.spamport.com API. Simply fill in the fields to have access to the requestLogin, addDomain and removeDomain functions. More information on https://www.spamport.com/spam_api

Current version: 1.0

# Coding examples:

requestLogin:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
	
    $domain = 'yourdomain.here';
    
    $response = $spamport -> requestLogin($domain);
    
    if ($spamport -> containsError($response)) {
	    
	    print $spamport -> returnError ($response);
	    
    } else {
	    
	    header ('Location: https://www.spamport.com/login/' . $domain . '/' . $spamport -> returnResult($response));
	    
    }
    
?>
```

addDomain:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
        
    $domain = 'yourdomain.ext';
    $smtpserver = 'mail.yourdomain.ext';
    $transport_type = 'hostname'; 			//"hostname" for a hostname, or "ip" for an IP address (ipv4/ipv6)
    $archive = 14; 							//can be 14 or 365
    $report_to = 'info@yourdomain.ext'; 	//optional
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
        
    $response = $spamport -> addDomain($domain, $smtpserver, $transport_type, $archive, $report_to);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

removeDomain:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
        
    $domain = 'yourdomain.ext';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
        
    $response = $spamport -> removeDomain($domain);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```
