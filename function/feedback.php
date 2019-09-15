<?php
include "../function/function.php";


if(ifItIsMethod('POST')){
 $total = $_POST['q1'] + $_POST['q2'] + $_POST['q3'] + $_POST['q4']+ $_POST['q5'];
 $value = $total / 500 ;
 $id = $_POST['id'];

$save_feed = "UPDATE orders_detailes SET feedback = $value where order_id = $id";
$query_feed = mysqli_query($connection,$save_feed );


}