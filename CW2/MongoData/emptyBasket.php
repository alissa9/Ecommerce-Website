<?php

//Include libraries
require __DIR__ . '../../../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->CarScape;

//Extract ID from POST data

$model= filter_input(INPUT_POST, 'CarModel', FILTER_SANITIZE_STRING);
//Build PHP array with delete criteria 

$deleteCriteria = [
    "model" => $model, 
];

//Delete the customer document
$deleteRes = $db->basket->deleteOne($deleteCriteria);
    
//Echo result back to user
if($deleteRes->getDeletedCount() == All){
    echo 'order deleted successfully.';
   // include('../Cart.php');
}
else{
   echo 'Error deleting order';
//    include('../Cart.php');
}

