<?php
    //Start session management
    session_start();
    
    if( array_key_exists("loggedInUserEmailAdmin", $_SESSION) ){
        echo "ok";
    }
    else{
        echo 'Not logged in.';
    }

