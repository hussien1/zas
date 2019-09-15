<?php
include "../function/function.php";

if(ifItIsMethod('POST')){
    $username = $_POST['userName'];
    $password = $_POST['password'];

    login_user($username, $password);

    


   
}