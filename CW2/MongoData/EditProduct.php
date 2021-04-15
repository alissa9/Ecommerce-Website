<?php

//Include libraries
require __DIR__ . '../../../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->CarScape;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the customers that match  this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results as forms
echo "<h1>Customers</h1>";   
foreach ($cursor as $cust){
    echo '<form action="EditProductResponse.php" method="post">';
    echo 'make: <input type="text"  ' . $cust['make'] . '" required><br>';
    echo 'model: <input type="text" ' . $cust['model'] . '" required><br>';
    echo 'price: <input type="number" n' . $cust['price'] . '" required><br>'; 
    echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}

 