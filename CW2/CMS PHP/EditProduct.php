<?php
    include('../Website/common.php');                                                                     //Includes Common
        outputCMSTab("CAR SCAPE | Edit Products");                                                 //Outputs Tab Name
        outputCMSHeader("Edit Products");                                                         //Outputs Header
?>

<!--FIND PRODUCT-->

<html>

  <form>                                                                                            <!--Add Car Entry Form-->

    <div class="entryform">

      <h1>Edit Products</h1>                                                                         <!--Form Title-->

      <hr>

      <!--May Change to Drop Downs-->
      <form action="EditProductResponse.php" method="post">

        <label for="productid"><p>Find Car By Product ID</p></label>                                <!--Find Car ID Prompt-->
        <input type="text" placeholder="Please Enter The Cars' ID" id="id" required >

        <label for="make"><p>Update Make</p></label>                                           <!--Find Car Make Prompt-->
        <input type="text" placeholder="Please Enter The Cars' Make" id="make" required >

        <label for="model"><p>Update Model</p></label>                                         <!--Find Car Model Prompt-->
        <input type="text" placeholder="Please Enter The Cars' Model" id="model" required >

        <label for="price"><p>Update Price</p></label>                                         <!--Find Car Price Prompt-->
        <input type="text" placeholder="Please Enter The Cars' Price" id="price" required >

        <label for="quantity"><p>Update Quantity</p></label>                                         <!--Find Car Price Prompt-->
        <input type="text" placeholder="Please Enter The Cars' Quantity" id="quantity" required >

        <label for="keywords"><p>Update Key Words</p></label>                                         <!--Find Car Price Prompt-->
        <input type="text" placeholder="Please Enter The Cars' Key Words  " id="keywords" required>
      
        <hr>

        <p>  Submit To Update Changes</p>

        <input type="submit"  class="submit"> <br>

      </form>

    </div>

  </form>      

</html>

<?php
    outputFooter();                                                                               //Outputs Footer
?>