<?php


require __DIR__ . '../../../vendor/autoload.php';

$mongoClient = (new MongoDB\Client);

$db = $mongoClient->CarScape;

$search = $_POST['search'];

$findCriteria = [
    '$text' => ['$search' => $search]
];

$cursor = $db->cars->find($findCriteria,["limit"=>3]);


foreach ($cursor as $Cars) {

    echo '
            
            <div class="grid-item"><img class="CarPic" src="' . $Cars["image_url"] . '" 
    
            alt=""><p>' . $Cars["make"] . '</p>    <p>' . $Cars["model"] . '</p> <p>' . $Cars["price"] . '</p>   
            <input id="addtocart"  type="button" onclick="addToCart()" value="Add to cart "/> </div> ';
}
