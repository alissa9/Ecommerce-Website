<?php
    include('../Website/common.php');                                                                        //Includes Common
        outputCMSTab("CAR SCAPE | Add Products");                                                            //Outputs Tab Name
        outputCMSHeader("Add Products");                                                                     //Outputs Header
?>

<html>

    <form   method="post">       <!--Add Car Entry Form-->

    <div class="entryform">

        <h1>Product Entry Form</h1>

            <hr>

            <label for="make"><p>Make</p></label>                                                              
            <input  type="text"  placeholder="Please Enter The Cars' Make" id="make" required><br /> 

            <label for="model"><p>Model</p></label>                                                            
            <input  type="text"  placeholder="Please Enter The Cars' Model" id="model" required><br /> 

            <label for="price"><p>Price</p></label>                                                            
            <input  type="number" placeholder="Please Enter The Cars' Price" id="price" required><br /> 

            <label for="quantity"><p>Quantity</p></label>                                                            
            <input  type="number"   placeholder="Please Enter The Quantity Of The Car" id="quantity" required><br /> 

            <label for="keywords"><p>Key Words</p></label>                                                            
            <input  type="text"   placeholder="Sports, Hatchback, colour..etc" id="keywords" required><br /> 

            <hr>
            <!--Button To Submit When Done Adding Product To Database-->
            <input type="submit" onclick="addProduct()"   class="submit"> </div>        

            <span id="addproductresponse"></span> <!--Response-->                                                                      
        
        </div>
    </form>

</html>

<script>
    function addProduct(){

        let request = new XMLHttpRequest();

        request.onload = () => {

        if(request.status === 200){

            let responseData = request.responseText;

            document.getElementById("addproductresponse").innerHTML = responseData;
        }
        else
        alert("Error communicating with server: " + request.status);
        };

        request.open("POST", "../MongoData/AddProductResponse.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                

        let proMake = document.getElementById("make").value;
        let proModel = document.getElementById("model").value;
        let proPrice = document.getElementById("price").value;
        let proQuantity = document.getElementById("quantity").value;
        let proKeywords = document.getElementById("keywords").value;
    
                    

        request.send("make=" + proMake + "&model=" + proModel + "&price=" + proPrice + "&quantity=" + proQuantity + "&keywords=" + proKeywords);

    }

</script> 

<?php
    outputFooter();                                                                                         //Outputs Footer
?>
