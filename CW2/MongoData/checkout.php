<?php
session_start();
//Include libraries
require __DIR__ . '../../../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
 $db = $mongoClient->CarScape;

//Select a collection
$collection = $db->basket; 
$collectionOrders = $db->orders;

//Extract the data that was sent to the server

$customer = filter_input(INPUT_POST, 'customer', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);

$basketItems = $collection->find();

if( array_key_exists("loggedInUserEmailCustomer", $_SESSION) ){
        $CustomerEmail = $_SESSION["loggedInUserEmailCustomer"];

        foreach ($basketItems as $items) {
            $basketData =  [
            "image_url" => $items ["image_url"],
            "make" => $items ["make"], 
            "model" => $items ["model"],
            "price" => $items ["price"],
            "customer" => $CustomerEmail,
            "email" => $email, 
            "customer" => $customer,
            "address" => $address, 
            "postcode" => $postcode 
            ];
            
            
          $insertResult = $collectionOrders->insertOne($basketData);
            }
     
    }
    else{
        echo 'cant order at the moment';
    }





    
// Echo result back to user
if($insertResult->getInsertedCount()==1){
    
     echo ' Thanks for purchasing with us your Order Id is  ' . $insertResult->getInsertedId();
     include('../Website/Home.php');

}
else {
    echo 'Error adding customer';
}
