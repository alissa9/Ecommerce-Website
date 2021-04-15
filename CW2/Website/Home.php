<?php
    include('../Website/common.php');       //Includes Common
        outputTab("CAR SCAPE | Home");      //Outputs Tab Name
        outputHeader("Home");    
        
     //The Serach Bar 
    echo '<div id="searchbar">

        <input type="text" placeholder="Find Your Ride..." id="searchbox">

        <button  onclick="searchCars()" id="searchbutton">🔎</button>

    </div> ';                                                                               
?>

<html>

    <div class="homeImage"></div>
    <!--Display Main Image-->

    <div class="banner">
        <h1>Find Your Perfect Car</h1>
    </div>

    <div id=sort-container>

        <p>Sort Products By</p>
        <select id="sort-wrapper">
            <option value="htl">High to Low £ </option>
            <option value="lth">Low to High £</option>
            <option value="az">A-Z</option>
            <option value="za">Z-A</option>
        </select>
        <button onclick="sortitems()" class="sortButton">Sort</button>

    </div>

    <div id="products"></div>

</html>

<?php

    require __DIR__ . '../../../vendor/autoload.php'; //includes libary

    $mongoClient = (new MongoDB\Client); //mongodb client

    $db = $mongoClient->CarScape;

    $cursor = $db->cars->find(); //adding to js function

    // outputting a grid wrapper and a wrapper for all products 
    echo'<div class="Product-wrapper">    
    <div class="gridwrapper">  ';

    // looping through arrays of data from mongodb and outputing specific product values
    foreach ($cursor as $Cars) { 
                                                                                                
        echo'
        <div class="grid-item"><img class="CarPic" src="'.$Cars["image_url"].'" 

        alt=""><p  class="CarMake" >'.$Cars["make"].'</p>    <p class="CarModel">'.$Cars["model"].'</p>

        <p class="CarPrice" >£'.$Cars["price"].'</p>
          
        <button class="addtocart"  onclick="addToCart()" value="Add to cart "/> Add to Cart</div> ';

    }
    
    echo'
    </div>
    </div>  ';

?>

<html>
    <span id="addtocartresponse"></span>
    <!--Response-->

</html>

<?php  
    outputFooter();          
?>
