<?php 
include "function.php";

if(ifItIsMethod('GET')) {
  
   $id =  $_GET['id'];
   $rand =  rand();
$save_invoic = "INSERT INTO invoices(order_id,invoice_number)
                             values ($id,  $rand)";
$approve_query_order = mysqli_query($connection, $save_invoic );

$query = "UPDATE orders_detailes SET status = 12  WHERE order_id = $id ";
$approve_query = mysqli_query($connection, $query);

logs('Oredr Fished BY Provider', $id);

redirect('../third-party.php');

}