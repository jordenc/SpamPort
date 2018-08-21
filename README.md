# SpamPort PHP Class
PHP API class for SpamPort.com spam filtering

Download our SpamPort_api.php file for easy integration of the https://www.spamport.com API. Simply fill in the fields to have access to the requestLogin, addDomain, removeDomain, infoDomain, getDomains, newPassword, setOutgoing and setReportTo functions. More information on https://www.spamport.com/spam_api

Current version: 1.3

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

## addDomain:
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
        
    $response = $spamport -> addDomain($domain, $smtpserver, $transport_type, $archive, $report_to);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

## removeDomain:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
        
    $domain = 'yourdomain.ext';
        
    $response = $spamport -> removeDomain($domain);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

## infoDomain:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
        
    $domain = 'yourdomain.ext';
        
    $response = $spamport -> infoDomain($domain);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

Returns a JSON-encoded result set, for example:
{"domain":"spamport.com","transport":"smtp:mail.spamport.com","added":"2016-10-05","report_to":""}

## getDomains:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $response = $spamport -> getDomains();
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

Returns a JSON-encoded result set, for example:
[{"domain":"spamport1.com","transport":"smtp:mail.spamport1.com","added":"2016-09-27","report_to":""},{"domain":"spamport2.com","transport":"smtp:mail.spamport2.com","added":"2016-09-28","report_to":"info@spamport2.com"}]

## newPassword:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $domain = 'yourdomain.ext';
    
    $response = $spamport -> newPassword($domain);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

Returns the new (random) password

## setOutgoing:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $domain = 'yourdomain.ext';
    $outgoing = 'mail.yourdomain.ext';
    $transport = 'hostname';	//"hostname" for a hostname, or "ip" for an IP address (ipv4/ipv6)
    
    $response = $spamport -> setOutgoing($domain, $outgoing, $transport);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

## setReportTo:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $domain = 'yourdomain.ext';
    $report_to = 'info@yourdomain.ext';	//Can be left empty for no reports
    
    $response = $spamport -> setReportTo($domain, $report_to);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

