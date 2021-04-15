<?php
    include('../Website/common.php');                                                                                   //Includes Common
        outputTab("CAR SCAPE| Cart");                                                                                   //Includes Common
        outputHeader("Cart");                                                                                           //Includes Common
?>

<html>

  <!-- <div class ="homeImage"></div> -->

  <div class="cartbanner"><h1>Cart</h1></div>

  <div class="Item">

    <div id ="cartSummary"></div> 

  </div>

</html>

<?php
 //Include libraries
 require __DIR__ . '../../../vendor/autoload.php';
 
 //Create instance of MongoDB client
 $mongoClient = (new MongoDB\Client);
 
 //Select a database
 $db = $mongoClient->CarScape;
 
 // creating a cursor of all product's data
 $cursor = $db->basket->find();
 
 //outputting a grid wrapper and a wrapper for all products
 // looping through arrays of data from mongodb and outputing specific product values

 echo' <div class="Cartwrapper">
       <div class="grid-Cart">
          
            
        ';
  foreach ($cursor as $basket) {    
    echo'
    <table class="basketItems">

      <tr> 
        
        <th class="CarPic"><img src="'.$basket["image_url"].'"alt="" ></th>

        <th class="CarMake">'.$basket["make"].'</th>    

        <th class="CarModel">'.$basket["model"].'</th> 
        
        <th class="CarPrice">'.$basket["price"].'</th> 
        <th><button onclick="removeItem()" class="removeItem"> Remove </button></th>
        
        
        
      
       
    </table></tr>
    
    </br>';
  }

  //   divs closing the table of cart products    
  echo' </br> </div> </div> ';
                                   
?>

<html>

 <button class="confirmButton" onclick="openCheckout()">Order</button> <!--Displays Order Summary-->

  <div id="orderSummary">

    <h2>By Filling the details and Placing your order, you are agreeing to our Purchase Terms.</h2>

    <div id ="orderSummaryInside">

      <form action="../MongoData/checkout.php" method="post" > 
      
        <p>Name:</p><input required name="customer"  id="customer"><br/>
        <p>Email:</p><input required name="email"  id="customerEmail"><br/>
        <p>Adress:</p><input required name="address"  id="address"><br/>
        <p>PostCode:</p><input required name="postcode"  id="postcode"><br />

        <button class="thankYouButton" onclick="thankYou()" > CheckOut  </button>

      </form>

      <div class="order Confirmation">

        <p id="thankYouText"></p>

      </div>

      </div>

  </div>

  <div class="inquires">
    <p>We hope you have enjoyed our service so far. We’re committed to helping you use our platform to its full potential so you can get where you need to go A.S.A.P! And that’s why we need your help.
    Could you spare some time to email us at CarScapeFeeback@gmail.com to help us better the site and service? It shouldn’t take more than 4 minutes in total, but it’ll be of invaluable help to us and give you the chance of winning another free Air Freshener.</p>
  </div>

</html>



<!-- customer recommendation table -->
<html>

  <div id="recommendTable">

    <p> </p>

    <div id="RecomendationDiv"></div>

  </div>

</html>

<?php
    outputFooter();                                                                                                     //Outputs Footer
?>