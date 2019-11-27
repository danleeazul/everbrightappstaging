<?php
// login checker for 'customer' access level
 
// if $require_login was set and value is 'true'
    // if user not yet logged in, redirect to login page
if(isset($require_login) && $require_login==true){
    if(isset($_SESSION['access_level']) && $_SESSION['access_level']!="Admin"){
        header("Location: {$home_url}login.php");         
        }
    }
else if(isset($_SESSION['access_level']) && $_SESSION['access_level']!="Officer"){
    header("Location: {$home_url}login.php");
    }
else if(isset($_SESSION['access_level']) && $_SESSION['access_level']!="Customer"){
    header("Location: {$home_url}login.php");
}
else{
    // no problem, stay on current page
}
?>