# SpamPort PHP Class
PHP API class for SpamPort.com spam filtering

Download our SpamPort_api.php file for easy integration of the https://www.spamport.com API. Simply fill in the fields to have access to the requestLogin, addDomain, removeDomain, infoDomain, getDomains, newPassword, setOutgoing and setReportTo functions. More information on https://www.spamport.com/spam_api

Current version: 1.8

# Coding examples:

## requestLogin:
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
    $weekly = 1;							//Weekly report (optional)
    $noscan = 0;							//Set to 1 to disable spamfilter for this domain
    $spamscore = "normal";					//Spamfilter strictness. Can be 'veryhigh' (might block legitimate mails), high, normal, low, very low (some spam might come through)
    $greylist = 0;						//Disable greylisting
        
    $response = $spamport -> addDomain($domain, $smtpserver, $transport_type, $archive, $report_to, $noscan, $spamscore, $greylist, $weekly);
        
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
		
		print '<pre>';
		
        print_r ($spamport -> returnResult ($response));
	
		print '</pre>';
		
    }
	
?>
```

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
	
		print '<pre>';
		
        print_r ($spamport -> returnResult ($response));
	
		print '</pre>';
		
    }
	
?>
```

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
    $weekly = 1;	//1 = Weekly, 0 = Daily report

    $response = $spamport -> setReportTo($domain, $report_to, $weekly);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

## SetFilter:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $domain = 'yourdomain.ext';
    $noscan = '1';	//Set to 1 to disable spamfilter, 0 will enable spamfilter
    
    $response = $spamport -> setFilter($domain, $noscan);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

## SetSpamscore:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $domain = 'yourdomain.ext';
    $spamscore = 'normal';	//Can be 'veryhigh' (might block legitimate mails), 'high', 'normal', 'low', 'verylow' (some spam might come through)
    
    $response = $spamport -> setSpamscore($domain, $spamscore);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```

## SetGreylist:
```php
<?php
    require_once('Spamport_api.php');
	
    $username = 'username_here';
    $password = 'password_here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api', $username, $password);
    
    $domain = 'yourdomain.ext';
    $greylist = '0';	//Set to 1 to enable greylisting, 0 will disable greylisting
    
    $response = $spamport -> setGreylist($domain, $greylist);
        
    if ($spamport -> containsError($response)) {

        print $spamport -> returnError ($response);
	
    } else {
	
        print $spamport -> returnResult ($response);
	
    }
	
?>
```
