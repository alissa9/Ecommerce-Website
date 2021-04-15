<?php
function outputTab($Tab)    /*Customer Tab Function & Esentials.*/
{

    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $Tab . '</title>';
    echo '<link rel="stylesheet" type="text/css" href="../CSS/Main.css">';
    echo '<link rel="stylesheet" href="../CSS/RegLog.css">';
    echo '<link rel="stylesheet" href="../CSS/Cart.css">';
    echo '</head>';
    echo '<body>';
    echo '<div class="background">';
}

function outputCMSTab($Tab)     /*Admin Tab Function & Esentials.*/
{
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $Tab . '</title>';
    echo '<link rel="stylesheet" href="../CSS/CMS.css">';
    echo '<link rel="stylesheet" href="../CSS/AdminLogin.css">';
   
    echo '</head>';
    echo '<body>';
    echo '<div class="background">';
     
}

function outputHeader($NavName)     /*Customer Header function*/
{

    echo '<div class="headerbackdrop">';

    echo '<div class="insideofheader">';



    echo '<div id="navigationbar" >';


    $NameOfPage = array("🛒", "Register & Login", "Home");      /*Names of Pages*/
    $AddressOfPage = array("Cart.php", "RegLog.php", "Home.php");      /*Location of Pages*/

    for ($n = 0; $n < count($NameOfPage); $n++) {     /*Start of Navigation Algorithm*/
        echo '<a ';

        if ($NameOfPage[$n] == $NavName) {      /*Start of Hover Algorithm*/
            echo 'class="hovering" ';
        }     /*End of Hover Algorithm*/

        echo 'href="' . $AddressOfPage[$n] . '">' . $NameOfPage[$n] . '</a>';
    }

    echo '</div>';      /*End of Navigation Bar*/
    echo '</div>';      /*End of Inner part fo header*/
    echo '</div>';      /*End of Outer part fo header*/
}

function outputCMSHeader($NavName)      /*Employee Header Function*/
{
    
    
    echo '<div class="headerbackdrop">';

    echo '<div class="insideofheader">';

    echo '<div class="navigationbar ">';

    
    $NameOfPage = array("Orders", "Edit Products", "Add Products", "View Products", "Admin Login");      /*Names of Pages*/
    $AddressOfPage = array("Orders.php", "EditProduct.php", "AddProduct.php", "ViewProduct.php", "AdminLogin.php");      /*Location of Pages*/

    for ($n = 0; $n < count($NameOfPage); $n++) {      /*Start of Navigation Algorithm*/
        echo '<a id="hiddenNav" ';

        if ($NameOfPage[$n] == $NavName) {      /*Start of Hover Algorithm*/
            echo 'class="hovering" ';
        }       /*End of Hover Algorithm*/

        echo 'href="' . $AddressOfPage[$n] . '">' . $NameOfPage[$n] . '</a>';
    }   


    echo '</div>';     /*End of Navigation Bar*/
    echo '</div>';     /*End of Inner part fo header*/
    echo '</div>';     /*End of Outer part fo header*/
   
}

function outputFooter()     /*Footer Function*/
{                                                                                                   
    echo '<footer>';
    echo '<div class="Gmail"><a href="https://mail.google.com/mail/?view=cm&source=mailto&to=[m99alissa@gmail.com]" ><img class="FooterPic" src="../images/Gmail.png" alt=""></a>
         </div class=""privacy"><a href="https://www.privacypolicies.com/live/42880436-f392-4d72-9d6a-c44415c12635" ><img class="privacyPic" src="../images/privacy.png" alt=""></a></div> </div>';   
    echo '</div>';
    echo '</footer>';
    echo '<script src="../js/sort.js"></script>';
    echo '<script src="../js/search.js" type = "module" ></script>';
    echo '<script src="../js/cart.js"></script>';
    echo '<script src="../js/loginCustomer.js"></script>';
    echo '<script src="../js/recommender.js" type = "module"></script>';
    echo '<script src="../js/adminLogin.js"></script>';
   
    echo '</body>';
    echo '</html>';
}
