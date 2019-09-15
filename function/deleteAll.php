<?php
include "../function/function.php";
if(ifItIsMethod('GET') ){
  $table =  $_GET['table'] ;
$query = "TRUNCATE TABLE  $table ";
$approve_query = mysqli_query($connection, $query);

}