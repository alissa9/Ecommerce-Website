<?php
    include('../Website/common.php');                                                                                     //Includes Common
        outputCMSTab("CAR SCAPE | Admin Login");                                                        //Includes Common
        outputCMSHeader("Admin Login");                                                                //Includes Common
?>

<html>

<div class="container">                                                                                               <!--Registration & Login Form-->

    <div class="login">Admin Log In</div>
            
        <div class="login-form">

            <div id="loginParaAdmin">

                

                    <p id="LoginParaAdmin">

                        Email:<input required  type="email" id="email">
                        Password:<input required type="password" id="password">
                        <button onclick="loginAdmin()" id="AdminloginButton" >Click To Login</button>
                        
                    </p>

                    <p style="color: Yellow" id="ErrorMessages"></p>

                

            </div>

        </div>

    </div>

</html>



<?php
   
    outputFooter();   

?>


