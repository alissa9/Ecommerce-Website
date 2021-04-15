<?php
  include('../Website/common.php');                                                                                          
  outputTab("CArScape | Registration & Login");                                                                       
  outputHeader("Register & Login");                                                                                   
?>

<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>                            

</head>


<script>    //Login and Signup tab JS
  $(document).ready(function(){                                                                                      

    $(".signup-form").hide();
    $(".signup").css("background", "none");

    $(".login").click(function(){
      $(".signup-form").hide();
      $(".login-form").show();
      $(".signup").css("background", "none");
      $(".login").css("background", "#fff");
    });

    $(".signup").click(function(){
      $(".signup-form").show();
      $(".login-form").hide();
      $(".login").css("background", "none");
      $(".signup").css("background", "#fff");
    });

    $(".btn").click(function(){
      $(".input").val("");
    });
  });
</script>

<html>

  <div class="container"> 

    <div class="login">Log In</div>

    <div class="signup">Sign Up</div>

    <div class="signup-form"> <!--Registration Form-->

      <form action="../MongoData/RegCustomer.php" method="post">

        First Name:<input required type="name" name="firstname"  id="firstNameInput"><br />
        Last Name:<input required type="name" name="lastname"  id="lastNameInput"><br />
        Address:<input required type="name" name="address"  id="addressInput"><br />
        Email:<input required type="email" name="email"  id="emailInput" ><br />
        Password:<input required type="password" name="password"  id="passwordInput"><br />

        <button  id="signupButton" > Sign UP </button>

      </form>


  </div>

  <div class="login-form"> <!--Login Form-->

    

      <p id="LoginPara">

        Email: <input type="email" id="email" required>
        Password:<input type="password" id="password" required>

        <button onclick= "loginCustomer()" id="loginButton" >Submit</button> 

        <p style="color: blue" id="ErrorMessages"></p>
      
      </p>

    
    
  </div>

  </div>

</html>


<?php
    outputFooter();     //Outputs Footer
?>
