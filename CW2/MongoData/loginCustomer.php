<?php
    //Start session management
    session_start();

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);    

    //Connect to MongoDB and select database
	require __DIR__ . '../../../vendor/autoload.php';//Include libraries
	$mongoClient = (new MongoDB\Client);//Create instance of MongoDB client
	$db = $mongoClient->CarScape;
	
    $collection = $db->customers;
    //Create a PHP array with our search criteria
    $findCriteria = [ "email" => $email ];

    //Find all of the customers that match  this criteria
    $resultArray = $db->customers->find($findCriteria)->toArray();

    //Check that there is exactly one customer
    if(count($resultArray) == 0){
        echo 'Customer email not found';
        return;
    }
    else if(count($resultArray) > 1){
        echo 'Database error: Multiple customers have same email address.';
        return;
    }
   
    //Get customer and check password
    $customer = $resultArray[0];
    if($customer['password'] != $password){
        echo 'Password incorrect.';
        return;
    }
        
    //Start session for this user
    $_SESSION['loggedInUserEmailCustomer'] = $email;
   
    
    //Inform web page that login is successful
    echo 'ok';  
   
	
    