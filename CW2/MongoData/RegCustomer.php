<?php

//Include libraries
require __DIR__ . '../../../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
 $db = $mongoClient->CarScape;

//Select a collection 
$collection = $db->customers;

//Extract the data that was sent to the server

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
     "email" => $email, 
    "password" => $password,
    "firstname" => $firstname, 
    "lastname" => $lastname, 
    "address"=> $address
   
 ];


//Add the new product to the database
$insertResult = $collection->insertOne($dataArray);
    
// Echo result back to user
if($insertResult->getInsertedCount()==1){
    
     // echo ' Thanks for signing up ' . $insertResult->getInsertedId();
     include('../Website/Home.php');

}
else {
    echo 'Error adding customer';
}






