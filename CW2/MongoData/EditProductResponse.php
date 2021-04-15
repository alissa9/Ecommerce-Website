<?php
    require __DIR__ . '../../../vendor/autoload.php';

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->CarScape;
    $collection = $db->Cars;

    $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
    $model= filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
    $keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);




//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$CarsData = [
    "make" => $make, 
    "model" => $model, 
    "price" => $price,
    "quantity" => $quantity,
    "keywords" => $keywords
];

//Replace customer data for this ID
$update = $db->Cars->replaceOne($replaceCriteria, $CarsData);
    
//Echo result back to user
if($update->getModifiedCount() == 1)
    echo 'Car document successfully replaced.';
else
    echo 'Car replacement error.';
