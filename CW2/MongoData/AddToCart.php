<?php
    //NEEDS TO SEND ITEMS TO CART
    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    require __DIR__ . '../../../vendor/autoload.php';

    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->CarScape;
    $collection = $db->basket;

    $image = filter_input(INPUT_POST, 'image_url', FILTER_SANITIZE_STRING);
    $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
    $model= filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
  

  
   
    
    $dataArray = [
        "image_url" => $image,
        "make" => $make, 
        "model" => $model, 
        "price" => $price
      
     ];

     $insertResult = $collection->insertOne($dataArray);

    if($image != "" && $make != "" && $model != "" && $price != "" ){//Check query parameters 
        //STORE REGISTRATION DATA IN MONGODB

        

        //Output message confirming registration
        echo 'The ' . $make . ' ' .  $model  . ' Was Added To Your Cart.';
    }
    else{//A query string parameter cannot be found
        echo 'The Item Failed To Be Added To The Cart, Please Try Again';
        
    }

