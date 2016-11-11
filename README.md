# SpamPort PHP Class
PHP API class for SpamPort.com spam filtering

Download our SpamPort_api.php file for easy integration of the www.spamport.com API. Simply fill in the fields to have access to the requestLogin, addDomain and removeDomain functions. More information on https://www.spamport.com/spam_api

Current version: 1.0

# Coding examples:

requestLogin:
<?php
	require_once($path . '/application/libraries/Spamport_api.php');
	
	$username = 'username_here';
    $password = 'password_here';
    $domain = 'yourdomain.here';
        
    $spamport = new SpamPort_API ('https://www.spamport.com/api');
        
    $response = $spamport -> requestLogin($username, $password, $domain);
    
    if ($spamport -> containsError($response)) {
	    
	    print $spamport -> returnError ($response);
	    
    } else {
	    
	    header ('Location: https://www.spamport.com/login/' . $domain . '/' . $spamport -> returnResult($response));
	    
    }
    
?>

addDomain:

removeDomain:
