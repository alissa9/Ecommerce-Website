<?php
    include('../Website/common.php');                             //Includes Common
        outputCMSTab("CAR SCAPE | View Products");         //Outputs Tab Name
        outputCMSHeader("View Products");                 //Outputs Header
?>

<html>

  <div class="tablediv">

    <table>                                                   <!--Start of Product Table-->

      <hr>

      <tr>

        <th style="color: green">Car ID</th>                                            <!--Table Headers-->
        <th style="color: green">Model</th>
        <th style="color: green">Make</th>
        <th style="color: green">Price</th>
        <th style="color: green">Quantity</th>
        
      </tr>
    
      <div id="products"></div>

    </table>

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
 $cursor = $db->cars->find();
 
 //outputting a grid wrapper and a wrapper for all products
 
 
 // looping through arrays of data from mongodb and outputing specific product values
 
 
  foreach ($cursor as $Cars) {    

    echo'
      
    <table>

      <tr> 
        <th>'.$Cars["_id"].'</th>
        <th>'.$Cars["make"].'</th>    
        <th>'.$Cars["model"].'</th> 
        <th>'.$Cars["price"].'</th> 
        <th>'.$Cars["quantity"].'</th>

      </tr>

    </table> </br>';
  }
  echo' </br>  <hr>';

  outputFooter();                                        //Outputs Footer

?>