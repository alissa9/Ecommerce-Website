<?php
    
    session_start();
    
	require __DIR__ . '../../../vendor/autoload.php';//Include libraries
	$mongoClient = (new MongoDB\Client);//Create instance of MongoDB client
	$db = $mongoClient->CarScape;
	
    $collection = $db->basket;
    $collectionOrders = $db->orders;

    $baksetItems = $collection->find();

    if( array_key_exists("loggedInUserEmail", $_SESSION) ){
        $CustomerEmail = $_SESSION["loggedInUserEmail"]

        foreach ($basketItems as $items) {
            $basketData =  [
            "image_url" => $items ["image_url"]
            "make" => $items ["make"], 
            "model" => $items ["model"],
            "price" => $items ["price"],
            "cutomer" => $CustomerEmail 
            ]
            
            $collectionOrders->insertOne($basketItems);
 

             echo ' Thanks for Ordering with us ' . $collectionOrders->getInsertedId();
            

        }
    }

