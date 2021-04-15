<?php

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    require __DIR__ . '../../../vendor/autoload.php';

    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->CarScape;
    $collection = $db->cars;

    $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
    $model= filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
    $keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
  
   
    
    $dataArray = [
        "make" => $make, 
        "model" => $model, 
        "price" => $price,
        "quantity" => $quantity,
        "keywords" => $keywords
     ];

     $insertResult = $collection->insertOne($dataArray);

    if($make != "" && $model != "" && $price != "" && $quantity != "" && $keywords != ""){//Check query parameters 
        //STORE REGISTRATION DATA IN MONGODB

        

        //Output message confirming registration
        echo 'The Product ' .  $model  . ' Was Added To The Database.';
    }
    else{//A query string parameter cannot be found
        echo 'Not All Fields Have Been Filled';
        
    }



    
