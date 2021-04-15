<?php
    include('../Website/common.php');     //Includes Common
        outputCMSTab("CAR SCAPE | Orders");     //Outputs Tab Name
        outputCMSHeader("Orders");       //Outputs Header
?>

<html>

  <form action="../MongoData/deleteOrder.php" method="post">    <!--Add Car Entry Form-->

    <div class="entryform">

      <h1> Delete Order  </h1>

      <hr>

        <label><p>Enter Order ID</p></label>                                                              
        <input  type="text"  name="id"  id="make" required><br /> 
        <input type="submit" id ="deleteButton">

      <hr>

    </div>

  </form>

</html>

<?php
 //Include libraries
 require __DIR__ . '../../../vendor/autoload.php';
 
 //Create instance of MongoDB client
 $mongoClient = (new MongoDB\Client);
 
 //Select a database
 $db = $mongoClient->CarScape;
 
 // creating a cursor of all product's data
 $cursor = $db->orders->find();
 
 //outputting a grid wrapper and a wrapper for all products
 
 echo'

  <h1 id="vieworder">View Customer Orders</h1>  
  
  <hr>

  <table>                                                   
                    
  
                        
    <tr>

      <th style="color: black">Order ID</th>                                           
      <th style="color: black">Customer</th>
      <th style="color: black">Customer Email</th>
      <th style="color: black">Address</th>
      <th style="color: black">Model</th>
      <th style="color: black">Price</th>
      
    </tr>
  
    <div id="products"></div>

  </table>
 ';
 
 // looping through arrays of data from mongodb and outputing specific product values
  foreach ($cursor as $orders) {    

    echo'
      
    <table>

      <tr>

        <th>'.$orders["_id"].'</th>
        <th>'.$orders["customer"].'</th>    
        <th>'.$orders["email"].'</th> 
        <th>'.$orders["address"].'</th> 
        <th>'.$orders["model"].'</th> 
        <th>'.$orders["price"].'</th>

      </tr>

    </table> </br>';

  }

  echo' </br> <hr>  ';

?>

<?php
    outputFooter();   //Outputs Footer
?>